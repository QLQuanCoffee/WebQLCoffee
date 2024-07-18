<?php
namespace App\Repositories\Interfaces;
interface TypeInterface{
    public function getAllTypes();
    public function getType($id);
    public function insertType($data);
    public function updateType($data,$id);
    public function deleteType($id);
}
