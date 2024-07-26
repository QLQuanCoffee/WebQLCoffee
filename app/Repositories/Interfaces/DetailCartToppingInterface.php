<?php
namespace App\Repositories\Interfaces;
interface DetailCartToppingInterface{
    public function getAllDetailCartToppings();
    public function getDetailCartTopping($id);
    public function getDetailByCart($idCart);
    public function insertDetailCartTopping($data);
    public function updateDetailCartTopping($data,$id);
    public function deleteDetailCartTopping($id);
}
