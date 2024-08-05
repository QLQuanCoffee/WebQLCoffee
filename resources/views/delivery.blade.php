@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-5 mb-3">
                <h2>Thông tin giao hàng</h2>
                <p><strong>Địa chỉ giao hàng:</strong> {{ session('address') }}</p>
            </div>
            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div id="map" style="height: 400px; width: 100%;"></div>
                        <div id="saved-location-info" class="mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([0, 0], 13);
        var startMarker, endMarker, routeLayer;
        var nearestLocation = null;

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        const endpoint = {!! json_encode(session('address')) !!};
        const targetLocations = @json($shops->pluck('address'));

        function findNearest(endpoint) {

            if (endMarker) map.removeLayer(endMarker);
            if (startMarker) map.removeLayer(startMarker);
            if (routeLayer) map.removeLayer(routeLayer);

            var geocodeUrl =
                `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(endpoint)}&format=json&limit=1&addressdetails=1&countrycodes=VN`;

            fetch(geocodeUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.length === 0) {
                        alert('Không tìm thấy vị trí giao hàng. Vui lòng kiểm tra lại thông tin vị trí');
                        return;
                    }

                    var endCoords = [data[0].lat, data[0].lon];
                    endMarker = L.marker(endCoords).addTo(map).bindPopup('Nơi nhận hàng: ' + endpoint)
                        .openPopup();

                    const targetPromises = targetLocations.map(target => {
                        var targetGeocodeUrl =
                            `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(target)}&format=json&limit=1&addressdetails=1&countrycodes=VN`;

                        return fetch(targetGeocodeUrl)
                            .then(response => response.json())
                            .then(data => data.length ? {
                                name: target,
                                lat: data[0].lat,
                                lon: data[0].lon
                            } : null);
                    });

                    Promise.all(targetPromises).then(targets => {
                        let shortestDistance = Infinity;
                        let nearestTarget = null;

                        const distancePromises = targets.map(target => {
                            if (!target) return null;

                            const routeUrl =
                                `https://router.project-osrm.org/route/v1/driving/${target.lon},${target.lat};${endCoords[1]},${endCoords[0]}?overview=false`;

                            return fetch(routeUrl)
                                .then(response => response.json())
                                .then(data => {
                                    const distance = data.routes[0].distance;
                                    if (distance < shortestDistance) {
                                        shortestDistance = distance;
                                        nearestTarget = target;
                                    }
                                });
                        });

                        Promise.all(distancePromises).then(() => {
                            if (!nearestTarget) {
                                alert('Không thể tìm thấy điểm gần nhất. Vui lòng thử lại.');
                                return;
                            }

                            var startCoords = [nearestTarget.lat, nearestTarget.lon];
                            nearestLocation = nearestTarget;
                            startMarker = L.marker(startCoords).addTo(map).bindPopup('Cửa hàng: ' +
                                nearestTarget.name).openPopup();

                            const routeUrl =
                                `https://router.project-osrm.org/route/v1/driving/${startCoords[1]},${startCoords[0]};${endCoords[1]},${endCoords[0]}?geometries=geojson&overview=full`;

                            fetch(routeUrl)
                                .then(response => response.json())
                                .then(data => {
                                    const route = data.routes[0];
                                    routeLayer = L.geoJSON(route.geometry, {
                                        style: {
                                            color: 'blue',
                                            weight: 4,
                                            opacity: 0.7
                                        }
                                    }).addTo(map);
                                    map.fitBounds(routeLayer.getBounds());
                                })
                                .catch(error => {
                                    alert('Không thể tìm thấy đường đi. Vui lòng thử lại.');
                                    console.error('Error:', error);
                                });
                        }).catch(error => {
                            alert('Không tìm thấy địa điểm');
                            console.error('Error:', error);
                        });
                    }).catch(error => {
                        alert('Lỗi khi tìm kiếm tọa độ của các địa điểm mục tiêu.');
                        console.error('Error:', error);
                    });
                })
                .catch(error => {
                    alert('Không tìm thấy nơi giao hàng');
                    console.error('Error:', error);
                });
        }

        window.onload = function() {
            findNearest(endpoint);
        };
    </script>
@endsection
