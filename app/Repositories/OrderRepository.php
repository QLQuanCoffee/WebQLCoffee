<?php
namespace App\Repositories;
use App\Repositories\Interfaces\OrderInterface;
use App\Models\Order;
class OrderRepository implements  OrderInterface{
    public function getAllOrders(){
        return Order::get();
    }
    public function getOrder($id){
        return Order::find($id);
    }
    public function insertOrder($data){
        Order::create($data);
    }
    public function updateOrder($data,$id){
        $order=Order::where('id',$id)->first();
        $order->date=$data['date'];
        $order->total_price=$data['total_price'];
        $order->user_id=$data['user_id'];
        $order->save();
    }
    public function deleteOrder($id){
        $order=Order::find($id);
        $order->delete();
    }
}
