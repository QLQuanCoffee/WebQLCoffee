<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ProductInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    private $product;
    public function __construct(ProductInterface $productInterface){
        $this->product=$productInterface;
    }
    public function index(){
        $products=$this->product->getQuantityProduct(0);
        return view('index',compact('products'));
        // return view('index');
    }

}
