<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    public function __construct(UserInterface $userInterface){
        $this->user=$userInterface;
    }
    public function index(){
        $users = $this->user->getAllUsers();
        return view('admin.user.index', compact('users'));
    }
    public function detail($id){
        $user = $this->user->getUser($id);
        return view('admin.user.detail', compact('user'));
    }
    public function insert(){
        return view('admin.user.insert');
    }
    public function postInsert(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users',
            'phone'=>'required|numeric',
            'password' => 'required|min:8',
            'address' => 'required'

        ],[
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Kích thước tối đa là 50 kí tự',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Vui lòng nhập định dạng email',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Vui lòng nhập số',
            'password.required' => 'vui lòng nhập mật khẩu',
            'password.min' => 'Kích thước chuỗi ít nhất là 8',
            'address.required' => 'Vui lòng nhập địa chỉ'
        ]);
        $this->user->insertUser([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' =>$request->get('phone'),
            'password' => Hash::make($request->get('password')),
            'address'=>$request->get('address'),
            'role' => 'user'
        ]);
        return redirect()->route('admin.user.index');
    }
    public function update($id){
        $user=$this->user->getUser($id);
        return view('admin.user.update', compact('user'));
    }
    public function postUpdate(Request $request){

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required',
            'address' => 'required'

        ],[
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Kích thước tối đa là 50 kí tự',
            'email.required' => 'Vui lòng nhập email',
            'address.required' => 'Vui lòng nhập địa chỉ'
        ]);
        $user=$this->user->getUser($request->get('id'));
        $this->user->updateUser([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' =>!empty($request->get('phone')) ? $request->get('phone') : $user->phone,
            'password' => (!empty($request->get('password'))==true) ? Hash::make($request->get('password')) : $user->password,
            'address'=>$request->get('address'),
            'role' => $user->role
        ],$request->get('id'));
        return redirect()->route('admin.user.index');
    }
    public function delete($id){
        $this->user->deleteUser($id);
        return redirect()->route('admin.user.index');
    }
}
