<?php
namespace App\Repositories\Interfaces;
interface ProductInterface{
    public function getAllProducts();
    public function getQuantityProduct($num);
    public function getProduct($id);
    public function insertProduct($data);
    public function updateProduct($data,$id);
    public function deleteProduct($id);
    public function getLastProductInsert();
}
