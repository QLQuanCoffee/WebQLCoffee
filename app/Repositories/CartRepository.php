<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CartInterface;
use App\Models\Cart;

class CartRepository implements CartInterface
{
    public function getAllCarts()
    {
        return Cart::get();
    }
    public function getCart($id)
    {
        return Cart::find($id)->first();
    }
    public function getCartByUser($id)
    {
        return Cart::where('user_id', $id)->get();
    }
    public function getCartByUserAndProduct($user_id, $product_id)
    {
        return Cart::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();
    }
    public function getCartByUserAndProductAndSize($user_id, $product_id, $size)
    {
        return Cart::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->where('size', $size)
            ->first();
    }

    public function insertCart($data)
    {
        Cart::create($data);
    }
    public function updateCart($data, $id)
    {
        $cart = Cart::where('id', $id)->first();
        $cart->quantity = $data['quantity'];
        $cart->save();
    }
    public function deleteCart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
    }
    public function deleteAllCart($idUser)
    {
        $carts = Cart::where('user_id', $idUser);
        $carts->delete();
    }
}
