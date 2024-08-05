<?php

namespace App\Http\Controllers;

use App\Models\DetailCartTopping;
use App\Repositories\Interfaces\DetailCartToppingInterface;
use App\Repositories\Interfaces\DetailToppingProductInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Interfaces\ToppingInterface;
use App\Repositories\Interfaces\TypeInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $type, $product;
    public function __construct(TypeInterface $typeInterface, ProductInterface $productInterface){
        $this->type=$typeInterface;
        $this->product=$productInterface;
    }
    public function products(){
        $types=$this->type->getAllTypes();
        $products=$this->product->getAllProducts();

        return view('products', compact('types', 'products'));
    }
    public function detail($id){
        $product=$this->product->getProduct($id);
        $products=$this->product->getQuantityProduct(6);
        return view('detail', compact('product','products'));
    }
    public function detailAdmin($id){
        $product=$this->product->getProduct($id);
        return view('admin.product.detail', compact('product'));
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
        $types=$this->type->getAllTypes();
        return view('admin.product.update', compact('product','types'));
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
        $photo=$product->photo;
        if($request->hasFile('photo')){
            $filePath='images/product/'.$product->photo;
            Storage::delete($filePath);
            $photo=$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('images/product',$photo);
        }
        $this->product->updateProduct([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'photo' => $photo,
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
