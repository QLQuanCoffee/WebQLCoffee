<?php
namespace App\Repositories\Interfaces;
interface OrderInterface{
    public function getAllOrders();
    public function getOrder($id);
    public function insertOrder($data);
    public function updateOrder($data,$id);
    public function deleteOrder($id);
}
