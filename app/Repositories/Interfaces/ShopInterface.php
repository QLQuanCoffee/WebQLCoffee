<?php
namespace App\Repositories\Interfaces;
interface ShopInterface{
    public function getAllShops();
    public function getShop($id);
    public function insertShop($data);
    public function updateShop($data,$id);
    public function deleteShop($id);
}
