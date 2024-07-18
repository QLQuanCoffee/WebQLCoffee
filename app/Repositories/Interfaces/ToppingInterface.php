<?php
namespace App\Repositories\Interfaces;
interface ToppingInterface{
    public function getAllToppings();
    public function getTopping($id);
    public function insertTopping($data);
    public function updateTopping($data,$id);
    public function deleteTopping($id);
}
