<?php
namespace App\Repositories;
use App\Repositories\Interfaces\DetailToppingProductInterface;
use App\Models\DetailToppingProduct;
class DetailToppingProductRepository implements  DetailToppingProductInterface{
    public function getAllDetailToppingProducts(){
        return DetailToppingProduct::get();
    }
    public function getDetailToppingProduct($id){
        return DetailToppingProduct::find($id);
    }
    public function getDetailByProduct($idProduct){
        return DetailToppingProduct::where('product_id',$idProduct)->get();
    }
    public function insertDetailToppingProduct($data){
        DetailToppingProduct::create($data);
    }
    public function updateDetailToppingProduct($data,$id){
        $detailToppingProduct=DetailToppingProduct::where('id',$id)->first();
        $detailToppingProduct->quantity=$data['quantity'];
        $detailToppingProduct->save();
    }
    public function deleteDetailToppingProduct($id){
        $detailToppingProduct=DetailToppingProduct::find($id);
        $detailToppingProduct->delete();
    }
}
