@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <h2>Update</h2>
        <form method="post" action="{{ route('admin.shop.postUpdate') }}" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ $shop->id }}">
            <table class="table table-bordered">
                <tr>
                    <td><label class="form-label">Tên cửa hàng</label></td>
                    <td>
                        <input type="text" class="form-control" id="type_name" placeholder="Tên cửa hàng" name="name"
                            value="{{ old('name') ?? $shop->name }}" />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Địa chỉ</label></td>
                    <td>
                        <input type="text" class="form-control" id="" placeholder="địa chỉ" name="address"
                            value="{{ old('address') ?? $shop->address }}" />
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <td><label class="form-label">Thông tin cửa hàng</label></td>
                    <td>
                        <input type="text" class="form-control" placeholder="Thông tin" name="description"
                            value="{{ old('description') ?? $shop->address }}" />
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Thời gian</label></td>
                    <td>
                        <input type="text" class="form-control" id="" placeholder="Thời gian" name="time"
                            value="{{ old('time') ?? $shop->time }}" />
                        @error('time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Ảnh</label></td>
                    <td>
                        <input type="file" class="form-control" id="type_name" name="photo"
                            value="{{ old('photo') ?? $shop->photo }}" />
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Link map</label></td>
                    <td>
                        <input type="text" class="form-control" placeholder="Thông tin" name="link_map"
                            value="{{ old('link_map') ?? $shop->link_map }}" />
                        @error('link_map')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
            </table>
            @csrf
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{ route('admin.type.index') }}" class="btn btn-danger">Huỷ</a>
        </form>
    </div>
@endsection
