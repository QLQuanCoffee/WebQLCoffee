<?php
namespace App\Repositories\Interfaces;
interface OrderDetailInterface{
    public function getAllOrderDetails();
    public function getOrderDetail($id);
    public function insertOrderDetail($data);
    public function updateOrderDetail($data,$id);
    public function deleteOrderDetail($id);
}
