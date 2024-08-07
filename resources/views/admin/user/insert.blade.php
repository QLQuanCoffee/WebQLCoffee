@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="post" action="{{ route('admin.user.postInsert') }}" enctype="multipart/form-data">
            <div class="login">
                <h2 class="mt-5 mb-3">Tạo mới tài khoản</h2>
                <!-- Name-->
                <input type="text" class="form-control mt-3 " name="name" placeholder="Họ Tên" value="{{ old('name') }}" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <!-- Email-->
                <input type="email" class="form-control mt-3" name="email" placeholder="Email của bạn" value="{{ old('email') }}" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <!-- Phone -->
                <input type="text" class="form-control mt-3" name="phone" placeholder="Điện thoại" value="{{ old('phone') }}" />
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <!-- Password-->
                <input type="password" class="form-control mt-3" name="password" placeholder="Nhập mật khẩu" value="{{ old('password') }}" />
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <!-- Address-->
                <input type="text" class="form-control mt-3" name="address" placeholder="Địa chỉ" value="{{ old('address') }}" />
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @csrf
                <p class="mt-1">Role</p>
                <select class="form-control" id="role" name="role">
                    <option value="user">user</option>
                    <option value="staff">staff</option>
                </select>
                <div class="action mt-3 mb-4">
                    <button type="submit" class="btn btn-success">Lưu</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-danger">Huỷ</a>
                </div>
            </div>
        </form>
    </div>
@endsection
