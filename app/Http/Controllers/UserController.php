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
    public function insert(){
        return view('admin.user.insert');
    }
    public function postInsert(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users,email',
            'phone'=>'numeric',
            'password' => 'required|min:8',

        ],[
            'name.required' => 'Please enter your name',
            'name.max' => 'Max size your name is 50',
            'email.required' => 'Please enter your email',
            'email.unique' => 'Please enter anoder email',
            'phone.numeric' => 'Please enter phone',
            'password.required' => 'Please enter your password',
            'password.min' => 'Min size your password is 8',
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
        return view('admin.user.insert', compact('user'));
    }
    public function postUpdate(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:users,email',
            'phone'=>'numeric',
            'password' => 'required|min:8',

        ],[
            'name.required' => 'Please enter your name',
            'name.max' => 'Max size your name is 50',
            'email.required' => 'Please enter your email',
            'email.unique' => 'Please enter anoder email',
            'phone.numeric' => 'Please enter phone',
            'password.required' => 'Please enter your password',
            'password.min' => 'Min size your password is 8',
        ]);
        $this->user->updateUser([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' =>$request->get('phone'),
            'password' => Hash::make($request->get('password')),
            'address'=>$request->get('address'),
        ],$request->get('id'));
        return view('admin.user.index');
    }
    public function delete($id){
        $this->user->deleteUser($id);
        return view('admin.user.index');
    }
}
