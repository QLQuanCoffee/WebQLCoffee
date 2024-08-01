<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\OrderDetailInterface;
use App\Repositories\Interfaces\OrderInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $order, $orderDetail;
    public function __construct(OrderInterface $orderInterface, OrderDetailInterface $orderDetailInterface){
        $this->order=$orderInterface;
        $this->orderDetail=$orderDetailInterface;
    }
    public function index(){
        $orders=$this->order->getAllOrders();
        return view('admin.order.index', compact('orders'));
    }
    public function delete($id){
        $order=$this->order->getOrder($id);
        if(!empty($order)){
            $this->order->deleteOrder($id);
            $this->orderDetail->deleteOrderDetail($id);
        }
        return redirect()->route('admin.order.index');
    }
    public function detail($id){
        $order=$this->order->getOrder($id);
        $orderDetails=$this->orderDetail->getOrderDetail($id);
        return view('admin.order.detail', compact('order', 'orderDetails'));
    }
}
