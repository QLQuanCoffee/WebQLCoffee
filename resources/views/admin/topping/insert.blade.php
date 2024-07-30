@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <h2>Insert</h2>
        <form method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td><label class="form-label">Loại topping</label></td>
                    <td>
                        <input type="text" class="form-control" id="type_name" placeholder="Tên topping" name="name"
                            value="{{ old('name') }}" />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Giá topping</label></td>
                    <td>
                        <input type="text" class="form-control" id="type_name" placeholder="Giá topping" name="price"
                            value="{{ old('price') }}" />
                        @error('price')
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
