<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CartInterface;
use App\Repositories\Interfaces\DetailCartToppingInterface;
use App\Repositories\Interfaces\DetailToppingProductInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $product, $cart, $detailCartTopping, $detailToppingProduct, $user;
    public function __construct(ProductInterface $productInterface, CartInterface $cartInterface, DetailCartToppingInterface $detailCartToppingInterface, DetailToppingProductInterface $detailToppingProductInterface, UserInterface $userInterface)
    {
        $this->user = $userInterface;
        $this->product = $productInterface;
        $this->cart = $cartInterface;
        $this->detailCartTopping = $detailCartToppingInterface;
        $this->detailToppingProduct = $detailToppingProductInterface;
    }
    public function index()
    {
        if (session()->get('id')) {
            $user = $this->user->getUser(session()->get('id'));
            $carts = $this->cart->getCartByUser(session()->get('id'));
            $details = $this->detailCartTopping->getAllDetailCartToppings();
            return view('cart', compact('carts', 'details', 'user'));
        }
        return redirect()->route('home');
    }
    public function saveAddress(Request $request)
    {
        $request->validate([
            'address_option' => 'required|in:existing,new',
            'address' => 'nullable|string|max:255',
        ]);
        $address = '';
        $user = $this->user->getUser(session()->get('id'));
        if ($request->address_option == 'new') {
            $address = $request->address;
        } else {
            $address = $user->address;
        }
        session(['address' => $address]);
        return redirect()->route('delivery');
    }

    public function addCart(Request $request)
    {
        if (session()->get('id')) {
            $size = 'small';
            if ($request->get('size-medium') == 'true') {
                $size = 'medium';
            } else if ($request->get('size-large') == 'true') {
                $size = 'large';
            }
            $cart = $this->cart->getCartByUserAndProductAndSize(session()->get('id'), $request->get('product_id'), $size);

            if ($cart) {
                $this->cart->updateCart([
                    'quantity' => $cart->quantity + 1,
                ], $cart->id);
            } else {
                $this->cart->insertCart([
                    'quantity' => 1,
                    'size' => $size,
                    'user_id' => session()->get('id'),
                    'product_id' => $request->get('product_id')
                ]);
                $cart = $this->cart->getCartByUserAndProductAndSize(session()->get('id'), $request->get('product_id'), $size);
                $toppings = $this->detailToppingProduct->getDetailByProduct($cart->product_id);
                foreach ($toppings as $i => $topping) {
                    if (isset($request->get('toppings')[$i]) && $request->get('toppings')[$i] == 1) {
                        $this->detailCartTopping->insertDetailCartTopping([
                            'topping_id' => $topping->topping_id,
                            'cart_id' => $cart->id,
                            'quantity' => 1,
                        ]);
                    }
                }
            }
            return redirect()->route('cart');
        }
        return redirect()->route('home');
    }


    public function updateCart(Request $request)
    {
        $cart = $this->cart->getCart($request->get('id'));
        if ($cart) {
            $this->cart->updateCart(['quantity' => $request->get('quantity')], $request->get('id'));
        }
        return redirect()->route('cart');
    }
    public function deleteCart(Request $request)
    {
        $cart = $this->cart->getCart($request->get('id'));
        if ($cart) {
            $this->cart->deleteCart($request->get('id'));
            $this->detailCartTopping->deleteDetailCartToppingByCart($request->get('id'));
        }
        return redirect()->route('cart');
    }
    public function deleteAllCart()
    {
        $carts = $this->cart->getCartByUser(session()->get('id'));
        foreach ($carts as $cart) {
            $this->detailCartTopping->deleteDetailCartToppingByCart($cart->id);
        }
        $this->cart->deleteAllCart(session()->get('id'));
        return redirect()->route('cart');
    }
}
