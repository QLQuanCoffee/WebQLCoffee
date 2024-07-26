<?php
namespace App\Repositories;
use App\Repositories\Interfaces\DetailCartToppingInterface;
use App\Models\DetailCartTopping;
class DetailCartToppingRepository implements  DetailCartToppingInterface{
    public function getAllDetailCartToppings(){
        return DetailCartTopping::get();
    }
    public function getDetailCartTopping($id){
        return DetailCartTopping::find($id);
    }
    public function getDetailByCart($idCart){
        return DetailCartTopping::where('cart_id',$idCart)->get();
    }
    public function insertDetailCartTopping($data){
        DetailCartTopping::create($data);
    }
    public function updateDetailCartTopping($data,$id){
        $detailCartTopping=DetailCartTopping::where('id',$id)->first();
        $detailCartTopping->quantity=$data['quantity'];
        $detailCartTopping->save();
    }
    public function deleteDetailCartTopping($id){
        $detailCartTopping=DetailCartTopping::find($id);
        $detailCartTopping->delete();
    }
}
