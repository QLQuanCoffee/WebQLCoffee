@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <h2>Chỉnh sửa loại sản phẩm</h2>
        <form method="post" action="{{ route('admin.topping.postUpdate') }}" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td><label class="form-label">Tên Topping</label></td>
                    <td>
                        <input type="hidden" name="id" value="{{ $topping->id }}">
                        <input type="text" value="{{ old('name') ?? $topping->name }}" class="form-control"
                            placeholder="Tên Loại" name="name" />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Giá</label></td>
                    <td>
                        <input type="text" value="{{ old('price') ?? $topping->price }}" class="form-control"
                            placeholder="Giá topping" name="price" />
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
            </table>
            @csrf
            <button type="submit" class="btn btn-primary">Sửa</button>
            <a href="{{ route('admin.type.index') }}" class="btn btn-danger">Huỷ</a>
        </form>
    </div>
@endsection
