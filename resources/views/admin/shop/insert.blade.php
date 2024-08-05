@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <h2>Insert</h2>
        <form method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td><label class="form-label">Tên cửa hàng</label></td>
                    <td>
                        <input type="text" class="form-control" id="type_name" placeholder="Tên cửa hàng" name="name"
                            value="{{ old('name') }}" />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Địa chỉ</label></td>
                    <td>
                        <input type="text" class="form-control" id="" placeholder="địa chỉ" name="address"
                            value="{{ old('address') }}" />
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <td><label class="form-label">Thông tin cửa hàng</label></td>
                    <td>
                        <input type="text" class="form-control" placeholder="Thông tin" name="description"
                            value="{{ old('description') }}" />
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Thời gian</label></td>
                    <td>
                        <input type="text" class="form-control" id="" placeholder="Thời gian" name="time"
                            value="{{ old('time') }}" />
                        @error('time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Ảnh</label></td>
                    <td>
                        <input type="file" class="form-control" id="type_name" name="photo"
                            value="{{ old('photo') }}" />
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Link map</label></td>
                    <td>
                        <input type="text" class="form-control" placeholder="Thông tin" name="link_map"
                            value="{{ old('link_map') }}" />
                        @error('link_map')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
            </table>
            @csrf
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{ route('admin.shop.index') }}" class="btn btn-danger">Huỷ</a>
        </form>
    </div>
@endsection
