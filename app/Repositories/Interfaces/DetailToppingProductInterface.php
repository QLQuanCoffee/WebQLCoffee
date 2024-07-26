<?php
namespace App\Repositories\Interfaces;
interface DetailToppingProductInterface{
    public function getAllDetailToppingProducts();
    public function getDetailToppingProduct($id);
    public function getDetailByProduct($idProduct);
    public function insertDetailToppingProduct($data);
    public function updateDetailToppingProduct($data,$id);
    public function deleteDetailToppingProduct($id);
}
