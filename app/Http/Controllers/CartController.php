<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CartInterface;
use App\Repositories\Interfaces\DetailCartToppingInterface;
use App\Repositories\Interfaces\DetailToppingProductInterface;
use App\Repositories\Interfaces\ProductInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $product, $cart, $detailCartTopping, $detailToppingProduct;
    public function __construct(ProductInterface $productInterface, CartInterface $cartInterface, DetailCartToppingInterface $detailCartToppingInterface, DetailToppingProductInterface $detailToppingProductInterface){
        $this->product=$productInterface;
        $this->cart=$cartInterface;
        $this->detailCartTopping=$detailCartToppingInterface;
        $this->detailToppingProduct=$detailToppingProductInterface;
    }
    public function index(){
        if(session()->get('id')){
            $carts=$this->cart->getCartByUser(session()->get('id'));
            // dd($carts);
            $details=$this->detailCartTopping->getAllDetailCartToppings();
            return view('cart', compact('carts', 'details'));
        }
        return redirect()->route('home');
    }
    public function addCart(Request $request){
        //dd($request->all());
        if(session()->get('id')){
            $size='small';
            if($request->get('size-medium')=='true')
                $size='medium';
            else if($request->get('size-large')=='true')
                $size='large';
            // add to cart
            $this->cart->insertCart([
                'quantity' => 1,
                'size' => $size,
                'user_id' => session()->get('id'),
                'product_id' => $request->get('product_id')
            ]);

            // get cart add
            $cart=$this->cart->getCartByUserAndProduct(session()->get('id'), $request->get('product_id'));

            // get topping of product in cart
            $toppings=$this->detailToppingProduct->getDetailByProduct($cart->product_id);

            // insert detail toppping and cart
            for ($i = 0; $i < count($toppings); $i++){
                if($request->get('toppings')[$i]==1){
                    $this->detailCartTopping->insertDetailCartTopping([
                        'topping_id' => $toppings[$i]->topping_id,
                        'cart_id' => $cart->id,
                        'quantity' => 1,
                    ]);
                }
            }
            return redirect()->route('cart');
        }
        return redirect()->route('home');
    }
    public function updateCart(Request $request){
        $cart=$this->cart->getCart($request->get('id'));
        if($cart){
            $this->cart->updateCart(['quantity'=>$request->get('quantity')],$request->get('id'));
        }
        return redirect()->route('cart');
    }
    public function deleteCart(Request $request){
        $cart=$this->cart->getCart($request->get('id'));
        if($cart){
            $this->cart->deleteCart($request->get('id'));
            $this->detailCartTopping->deleteDetailCartToppingByCart($request->get('id'));
        }
        return redirect()->route('cart');
    }
    public function deleteAllCart(){
        $carts=$this->cart->getCartByUser(session()->get('id'));
        foreach($carts as $cart){
            $this->detailCartTopping->deleteDetailCartToppingByCart($cart->id);
        }
        $this->cart->deleteAllCart(session()->get('id'));
        return redirect()->route('cart');
    }
}
