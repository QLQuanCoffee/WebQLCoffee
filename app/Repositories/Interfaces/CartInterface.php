<?php

namespace App\Repositories\Interfaces;

interface CartInterface
{
    public function getAllCarts();
    public function getCart($id);
    public function getCartByUser($id);
    public function getCartByUserAndProduct($user_id, $product_id);
    public function getCartByUserAndProductAndSize($user_id, $product_id, $size);
    public function insertCart($data);
    public function updateCart($data, $id);
    public function deleteCart($id);
    public function deleteAllCart($idUser);
}
