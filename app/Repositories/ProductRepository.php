<?php
namespace App\Repositories;
use App\Repositories\Interfaces\ProductInterface;
use App\Models\Product;
class ProductRepository implements  ProductInterface{
    public function getAllProducts(){
        return Product::get();
    }
    public function getQuantityProduct($num){
        return Product::limit($num)->get();
    }
    public function getProduct($id){
        return Product::find($id);
    }
    public function insertProduct($data){
        Product::create($data);
    }
    public function updateProduct($data,$id){
        $product=Product::where('id',$id)->first();
        $product->name=$data['name'];
        $product->price=$data['price'];
        $product->photo=$data['photo'];
        $product->description=$data['description'];
        $product->type_id=$data['type_id'];
        $product->save();
    }
    public function deleteProduct($id){
        $product=Product::find($id);
        $product->delete();
    }
    public function getLastProductInsert(){
        return Product::latest()->first();
    }
}
