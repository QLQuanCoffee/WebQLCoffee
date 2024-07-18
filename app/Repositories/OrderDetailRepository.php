<?php
namespace App\Repositories;
use App\Repositories\Interfaces\OrderDetailInterface;
use App\Models\OrderDetail;
class OrderDetailRepository implements  OrderDetailInterface{
    public function getAllOrderDetails(){
        return OrderDetail::get();
    }
    public function getOrderDetail($id){
        return OrderDetail::find($id);
    }
    public function insertOrderDetail($data){
        OrderDetail::create($data);
    }
    public function updateOrderDetail($data,$id){
        $orderDetail=OrderDetail::where('id',$id)->first();
        $orderDetail->quantity=$data['quantity'];
        $orderDetail->product_id=$data['product_id'];
        $orderDetail->order_id=$data['order_id'];
        $orderDetail->topping=$data['topping'];
        $orderDetail->price=$data['price'];
        $orderDetail->save();
    }
    public function deleteOrderDetail($id){
        $orderDetail=OrderDetail::find($id);
        $orderDetail->delete();
    }
}
