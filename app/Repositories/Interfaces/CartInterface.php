<?php
namespace App\Repositories\Interfaces;
interface CartInterface{
    public function getAllCarts();
    public function getCart($id);
    public function insertCart($data);
    public function updateCart($data,$id);
    public function deleteCart($id);
}
