<?php
namespace App\Repositories;
use App\Repositories\Interfaces\ShopInterface;
use App\Models\Shop;
class ShopRepository implements  ShopInterface{
    public function getAllShops(){
        return Shop::get();
    }
    public function getShop($id){
        return Shop::find($id);
    }
    public function insertShop($data){
        Shop::create($data);
    }
    public function updateShop($data,$id){
        $shop=Shop::where('id',$id)->first();
        $shop->name=$data['name'];
        $shop->description=$data['description'];
        $shop->address=$data['address'];
        $shop->time=$data['time'];
        $shop->link_map=$data['link_map'];
        $shop->photo=$data['photo'];
        $shop->save();
    }
    public function deleteShop($id){
        $shop=Shop::find($id);
        if(!empty($shop)){
            $shop->delete();
        }
    }
}
