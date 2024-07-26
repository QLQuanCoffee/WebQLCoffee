<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    private $user;
    public function __construct(UserInterface $userRepositoryInterface){
        $this->user=$userRepositoryInterface;
    }
    public function login(){
        return view('login');
    }
    public function storeLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);
        $user=$this->user->getUser($request->get('email'));
        if($user){
            if (Hash::check($request->get('password'), $user->password)){
                session()->put('id', $user->id);
                session()->put('email',$user->email);
                session()->put('name', $user->name);
                session()->put('avatar', $user->avatar);
                session()->put('role', $user->role);
                if($user->role=='admin')
                    return redirect()->route('admin');
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')->with('password','email or password was wrong');
        }
    }
    public function register(){
        return view('register');
    }
    public function storeRegister(Request $request){

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8'
        ],[
            'name.required' => 'Vui lòng nhập tên của bạn',
            'name.max' => 'Kích thước tên giới hạn là 50',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Vui lòng nhập email khác',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Chiều dài mật khẩu từ 8 kí tự'
        ]);
        $this->user->insertUser([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'phone'=>$request->get('phone'),
            'address'=>$request->get('address')
        ]);

        $user=$this->user->getUser($request->get('email'));
        session()->put('id', $user->id);
        session()->put('name', $user->name);
        session()->put('email',$user->email);
        session()->put('avatar', $user->avatar);
        session()->put('role', $user->role);
        return redirect()->route('home');
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
