<?php

namespace App\Http\Controllers;

use App\Models\DetailCartTopping;
use App\Repositories\Interfaces\DetailCartToppingInterface;
use App\Repositories\Interfaces\DetailToppingProductInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Interfaces\TypeInterface;
use Illuminate\Support\Facades\Storage;
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
    public function index(){
        $products=$this->product->getAllProducts();
        return view('admin.product.index', compact('products'));
    }
    public function insert(){
        $types=$this->type->getAllTypes();
        return view('admin.product.insert', compact('types'));
    }
    public function postInsert(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required',
            'description' => 'required',
            'type_id' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên',
            'price.required' => 'Vui lòng nhập giá',
            'price.numeric' => 'Vui lòng nhập số',
            'photo.required' =>'Vui lòng chọn ảnh sản phẩm',
            'description.required' => 'Vui lòng nhập thông tin sản phẩm',
            'type_id.required' => 'Vui lòng chọn loại sản phẩm'
        ]);
        if($request->hasFile('photo')){
            $extension=$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('images/products',$extension);
        }
        $this->product->insertProduct([
            'name' => $request->get('name'),
            'price'=> $request->get('price'),
            'photo'=> $extension,
            'description'=> $request->get('description'),
            'type_id'=> $request->get('type_id'),
        ]);
        return redirect()->route('admin.product.index');
    }
    public function update($id){
        $product=$this->product->getProduct($id);
        return view('admin.product.update', compact('product'));
    }
    public function postUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'type_id' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên',
            'price.required' => 'Vui lòng nhập giá',
            'price.numeric' => 'Vui lòng nhập số',
            'description.required' => 'Vui lòng nhập thông tin sản phẩm',
            'type_id.required' => 'Vui lòng chọn loại sản phẩm'
        ]);
        $product=$this->product->getProduct($request->get('id'));
        if($request->hasFile('photo')){
            $filePath='images/product/'.$product->photo;
            Storage::delete($filePath);
            $extension=$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('images/product',$extension);
        }
        $this->product->updateProduct([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'photo' => $request->hasFile('photo')? $extension: $product->photo,
            'description' => $request->get('description'),
            'type_id' => $request->get('type_id'),
        ], $product->id);
        return redirect()->route('admin.product.index');
    }
    public function delete($id){
        $product=$this->product->deleteProduct($id);
        return redirect()->route('admin.product.index');
    }
}
