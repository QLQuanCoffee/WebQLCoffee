<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\DetailCartToppingInterface;
use App\Repositories\Interfaces\DetailToppingProductInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Interfaces\ToppingInterface;
use App\Repositories\Interfaces\TypeInterface;
use Illuminate\Http\Request;

class DetailToppingProductController extends Controller
{
    private $detailToppingProduct, $product, $topping,$type;
    public function __construct(TypeInterface $typeInterface, ProductInterface $productInterface, DetailCartToppingInterface $detailCartToppingInterface, DetailToppingProductInterface $detailToppingProductInterface, ToppingInterface $toppingInterface){
        $this->type=$typeInterface;
        $this->product=$productInterface;
        $this->detailToppingProduct=$detailToppingProductInterface;
        $this->topping=$toppingInterface;
    }
    public function insert(Request $request){
        $toppings=$this->topping->getAllToppings();
        $detailToppings=$this->detailToppingProduct->getDetailByProduct($request->get('product_id'));
        $check=false;
        foreach($detailToppings as $topping){
            if($topping->topping_id==$request->get('topping_id')){
                $check=true;
            }
        }
        if($check==false){
            $this->detailToppingProduct->insertDetailToppingProduct([
                'quantity' => 0,
                'topping_id' => $request->get('topping_id'),
                'product_id' => $request->get('product_id'),
            ]);
        }
        $product=$this->product->getProduct($request->get('product_id'));
        $types=$this->type->getAllTypes();
        return view('admin.product.update', compact('product','detailToppings','types', 'toppings'));
    }
    public function delete(Request $request){
        $this->detailToppingProduct->deleteDetailToppingProductByProductAndTopping($request->get('product_id'),$request->get('topping_id'));
        $product=$this->product->getProduct($request->get('product_id'));
        $toppings=$this->topping->getAllToppings();
        $types=$this->type->getAllTypes();
        $detailToppings=$this->detailToppingProduct->getDetailByProduct($request->get('product_id'));
        return view('admin.product.update', compact('product','detailToppings','types', 'toppings'));
    }
}
