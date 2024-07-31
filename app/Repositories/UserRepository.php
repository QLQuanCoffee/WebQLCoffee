<?php
namespace App\Repositories;
use App\Repositories\Interfaces\UserInterface;
use App\Models\User;
class UserRepository implements  UserInterface{
    public function getAllUsers(){
        return User::get();
    }
    public function getUser($id){
        return User::find($id);
    }
    public function getUserByEmail($email){
        return User::where('email', $email)->first();
    }
    public function insertUser($data){
        User::create($data);
    }
    public function updateUser($data,$id){
        $user=User::where('id',$id)->first();
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->password=$data['password'];
        $user->role=$data['role'];
        $user->address=$data['address'];
        $user->save();
    }
    public function deleteUser($id){
        $user=User::find($id);
        $user->delete();
    }
}