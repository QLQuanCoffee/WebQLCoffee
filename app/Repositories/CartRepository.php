<?php
namespace App\Repositories;
use App\Repositories\Interfaces\CartInterface;
use App\Models\Cart;
class CartRepository implements  CartInterface{
    public function getAllCarts(){
        return Cart::get();
    }
    public function getCart($id){
        return Cart::find($id);
    }
    public function insertCart($data){
        Cart::create($data);
    }
    public function updateCart($data,$id){
        $cart=Cart::where('id',$id)->first();
        $cart->product_id=$data['product_id'];
        $cart->quantity=$data['quantity'];
        $cart->size=$data['size'];
        $cart->user_id=$data['user_id'];
        $cart->save();
    }
    public function deleteCart($id){
        $cart=Cart::find($id);
        $cart->delete();
    }
}
