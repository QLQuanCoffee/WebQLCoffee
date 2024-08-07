@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <form method="post" action="{{ route('admin.user.postUpdate') }}" enctype="multipart/form-data">
                <div class="login">
                    <h2 class="mt-5 mb-3">Sửa thông tin tài khoản</h2>
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <!-- Name-->
                    <input type="text" class="form-control mt-3 " name="name" placeholder="Họ Tên" value="{{ old('name') ?? $user->name}}" />
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- Email-->
                    <input type="email" class="form-control mt-3" name="email" placeholder="Email của bạn" value="{{ old('email') ?? $user->email }}" />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- Phone -->
                    <input type="text" class="form-control mt-3" name="phone" placeholder="Điện thoại" value="{{ old('phone') ?? $user->phone}}" />
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- Password-->
                    <input type="password" class="form-control mt-3" name="password" placeholder="Nhập mật khẩu" value="{{ old('password') }}" />
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- Address-->
                    <input type="text" class="form-control mt-3" name="address" placeholder="Địa chỉ" value="{{ old('address') ?? $user->address }} " />
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <p class="mt-1">Role</p>
                    <select class="form-control" id="role" name="role">
                        @if($user->role=='user')
                            <option value="user" selected>user</option>
                            <option value="staff">staff</option>
                        @else
                            <option value="user">user</option>
                            <option value="staff" selected>staff</option>
                        @endif
                    </select>
                    @csrf

                    <div class="action mt-3 mb-4">
                        <button type="submit" class="btn btn-success">Lưu</button>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-danger">Huỷ</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
