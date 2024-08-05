@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <h2>Insert</h2>
        <form method="post" action="{{ route('admin.product.postInsert') }}" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td><label class="form-label">Tên sản phẩm</label></td>
                    <td>
                        <input type="text" class="form-control" id="type_name" placeholder="Tên sản phẩm" name="name"
                            value="{{ old('name') }}" />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Giá</label></td>
                    <td>
                        <input type="text" class="form-control" id="" placeholder="Tên topping" name="price"
                            value="{{ old('price') }}" />
                        @error('price')
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
                    <td><label class="form-label">Thông tin sản phẩm</label></td>
                    <td>
                        <input type="text" class="form-control" placeholder="Thông tin" name="description"
                            value="{{ old('description') }}" />
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Loại</label></td>
                    <td>
                        <select class="form-control" id="type_id" name="type_id">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
            </table>
            @csrf
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        <a href="{{ route('admin.product.index') }}" class="btn btn-danger">Huỷ</a>
    </div>

@endsection
