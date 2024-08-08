@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-5 mb-3">
                <h2>Thông tin giao hàng</h2>
                <p><strong>Địa chỉ giao hàng:</strong> {{ session('address') }}</p>
                <div id="results"></div>
            </div>
            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div id="map" style="height: 400px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
        <script>
            class PriorityQueue {
                constructor() {
                    this.elements = [];
                }

                isEmpty() {
                    return this.elements.length === 0;
                }

                enqueue(item, priority) {
                    this.elements.push({
                        item,
                        priority
                    });
                    this.elements.sort((a, b) => a.priority - b.priority);
                }

                dequeue() {
                    return this.elements.shift().item;
                }
            }

            var map = L.map('map').setView([14.0583, 108.2772], 6);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            const endpoint = {!! json_encode(session('address')) !!};
            var arrayShop = @json($shops);
            var addressShop = arrayShop.map(shop => shop.address);
            addressShop.push(endpoint);
            const matrixSize = addressShop.length;
            var positions = createPosition(matrixSize);
            var distancesMatrix = Array.from({
                length: matrixSize
            }, () => Array(matrixSize).fill(null));
            var routes = {};
            //tạo mảng 2 chiều
            function createPosition(n) {
                const positions = [];
                for (let i = 0; i < n; i++) {
                    for (let j = i + 1; j < n; j++) {
                        positions.push([i, j]);
                    }
                }
                return positions;
            }
            //lấy vị trí
            function fetchLocationData(address) {
                const geocodeUrl =
                    `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(address)}&format=json&limit=1&addressdetails=1&countrycodes=VN`;
                return fetch(geocodeUrl)
                    .then(response => response.json())
                    .then(data => data.length ? {
                        address: address,
                        lat: data[0].lat,
                        lon: data[0].lon
                    } : {
                        address: address,
                        lat: null,
                        lon: null
                    });
            }
            //tìm đường đi
            function findRoute(start, end) {
                const routeUrl =
                    `https://router.project-osrm.org/route/v1/car/${start.lon},${start.lat};${end.lon},${end.lat}?overview=full&geometries=geojson`;
                return fetch(routeUrl)
                    .then(response => response.json())
                    .then(data => data.routes.length ? {
                        distance: data.routes[0].distance / 1000,
                        geometry: data.routes[0].geometry.coordinates
                    } : {
                        distance: null,
                        geometry: null
                    });
            }
            //tạo mảng 2 chiều
            async function calculateDistances(locations) {
                for (let [i, j] of positions) {
                    const routeData = await findRoute(locations[i], locations[j]);
                    if (routeData.distance !== null) {
                        distancesMatrix[i][j] = routeData.distance;
                        distancesMatrix[j][i] = routeData.distance;
                        routes[`${i}-${j}`] = routeData.geometry;
                        routes[`${j}-${i}`] = routeData.geometry;
                    }
                }
                return distancesMatrix;
            }
            //Chuyển thành đồ thị
            function createGraph(addresses, matrix) {
                const graph = {};
                for (let i = 0; i < addresses.length; i++) {
                    const address = addresses[i];
                    graph[address] = {};
                    for (let j = 0; j < addresses.length; j++) {
                        if (i !== j && matrix[i][j] !== null) {
                            graph[address][addresses[j]] = matrix[i][j];
                        }
                    }
                }
                return graph;
            }
            //thuật toán
            function dijkstra(graph, start) {
                const distances = {};
                const pq = new PriorityQueue();

                for (let node in graph) {
                    distances[node] = Infinity;
                }
                distances[start] = 0;

                pq.enqueue(start, 0);

                while (!pq.isEmpty()) {
                    const currentNode = pq.dequeue();
                    const currentDistance = distances[currentNode];

                    if (currentDistance > distances[currentNode]) {
                        continue;
                    }

                    for (let neighbor in graph[currentNode]) {
                        const distance = currentDistance + graph[currentNode][neighbor];
                        if (distance < distances[neighbor]) {
                            distances[neighbor] = distance;
                            pq.enqueue(neighbor, distance);
                        }
                    }
                }

                return distances;
            }
            //tính đường đi ngắn nhất
            function displayShortestPath(distances, endpoint, locations) {
                const resultDiv = document.getElementById('results');
                let nearestAddress = null;
                let minDistance = Infinity;

                for (const [address, distance] of Object.entries(distances)) {
                    if (address !== endpoint && distance < minDistance) {
                        minDistance = distance;
                        nearestAddress = address;
                    }
                }

                const endpointLocation = locations.find(loc => loc.address === endpoint);
                const nearestLocation = locations.find(loc => loc.address === nearestAddress);

                if (endpointLocation && nearestLocation) {
                    const endpointMarker = L.marker([endpointLocation.lat, endpointLocation.lon], {
                            color: 'red'
                        }).addTo(map)
                        .bindPopup(`<b>Nơi nhận</b><br>${endpoint}`).openPopup();
                    const nearestMarker = L.marker([nearestLocation.lat, nearestLocation.lon], {
                            color: 'green'
                        }).addTo(map)
                        .bindPopup(`<b>Nơi giao hàng</b><br>${nearestAddress}`).openPopup();

                    const routeKey = `${addressShop.indexOf(nearestAddress)}-${addressShop.indexOf(endpoint)}`;
                    const routeCoordinates = routes[routeKey];

                    if (routeCoordinates) {
                        const polyline = L.polyline(routeCoordinates.map(coord => [coord[1], coord[0]]), {
                                color: 'blue'
                            }).addTo(map)
                            .bindPopup(`Khoảng cách: ${minDistance.toFixed(2)} km`).openPopup();

                        map.fitBounds(polyline.getBounds());
                    }
                }

                const resultHtml = `
                    <p><strong>Cửa hàng gần nhất:</strong> ${nearestAddress}</p>
                    <p><strong>Khoảng cách:</strong> ${minDistance.toFixed(2)} km</p>
                `;
                resultDiv.innerHTML = resultHtml;
            }

            function delay(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }

            async function fetchAllLocationData(addresses) {
                const results = [];
                for (const address of addresses) {
                    results.push(await fetchLocationData(address));
                    await delay(2000);
                }
                return results;
            }

            (async () => {
                try {
                    const results = await fetchAllLocationData(addressShop);
                    const matrix = await calculateDistances(results);
                    const graph = createGraph(addressShop, matrix);
                    const distances = dijkstra(graph, endpoint);
                    displayShortestPath(distances, endpoint, results);
                } catch (error) {
                    console.error('Error fetching location data:', error);
                }
            })();
        </script>
    @endsection
