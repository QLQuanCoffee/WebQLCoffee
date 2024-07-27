<?php

namespace App\Http\Controllers;

use App\Models\DetailCartTopping;
use App\Repositories\Interfaces\DetailCartToppingInterface;
use App\Repositories\Interfaces\DetailToppingProductInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Interfaces\TypeInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $type, $product, $detailCartTopping, $detailToppingProduct;
    public function __construct(TypeInterface $typeInterface, ProductInterface $productInterface, DetailCartToppingInterface $detailCartToppingInterface, DetailToppingProductInterface $detailToppingProductInterface){
        $this->type=$typeInterface;
        $this->product=$productInterface;
        $this->detailCartTopping=$detailCartToppingInterface;
        $this->detailToppingProduct=$detailToppingProductInterface;
    }
    public function products(){
        $types=$this->type->getAllTypes();
        $products=$this->product->getAllProducts();
        return view('products', compact('types', 'products'));
    }
    public function detail($id){
        $product=$this->product->getProduct($id);
        $toppings=$this->detailToppingProduct->getDetailByProduct($id);
        // dd($toppings);
        $products=$this->product->getQuantityProduct(6);
        return view('detail', compact('product','toppings','products'));
    }
}
