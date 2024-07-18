<?php
namespace App\Repositories;
use App\Repositories\Interfaces\ToppingInterface;
use App\Models\Topping;
class ToppingRepository implements  ToppingInterface{
    public function getAllToppings(){
        return Topping::get();
    }
    public function getTopping($id){
        return Topping::find($id);
    }
    public function insertTopping($data){
        Topping::create($data);
    }
    public function updateTopping($data,$id){
        $topping=Topping::where('id',$id)->first();
        $topping->name=$data['name'];
        $topping->price=$data['price'];
        $topping->save();
    }
    public function deleteTopping($id){
        $topping=Topping::find($id);
        $topping->delete();
    }
}
