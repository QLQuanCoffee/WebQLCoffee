<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;
    public function __construct(UserInterface $userInterface){
        $this->user=$userInterface;
    }
    public function index(){
        $users=$this->user->getAllUsers();
        return view();
    }
}
