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
    private $type, $product, $detailCartTopping, $detailToppingProduct, $topping;
    public function __construct(TypeInterface $typeInterface, ProductInterface $productInterface, DetailCartToppingInterface $detailCartToppingInterface, DetailToppingProductInterface $detailToppingProductInterface, ToppingInterface $toppingInterface){
        $this->type=$typeInterface;
        $this->product=$productInterface;
        $this->detailCartTopping=$detailCartToppingInterface;
        $this->detailToppingProduct=$detailToppingProductInterface;
        $this->topping=$toppingInterface;
    }
    public function products(){
        $types=$this->type->getAllTypes();
        $products=$this->product->getAllProducts();

        return view('products', compact('types', 'products'));
    }
    public function detail($id){
        $product=$this->product->getProduct($id);
        $toppings=$this->detailToppingProduct->getDetailByProduct($id);
        $products=$this->product->getQuantityProduct(6);
        return view('detail', compact('product','toppings','products'));
    }
    public function detailAdmin($id){
        $product=$this->product->getProduct($id);
        $detailToppings=$this->detailToppingProduct->getDetailByProduct($id);
        return view('admin.product.detail', compact('product','detailToppings'));
    }
    public function index(){
        $products=$this->product->getAllProducts();
        return view('admin.product.index', compact('products'));
    }
    public function insert(){
        session()->put('ArrTopping',array());
        $types=$this->type->getAllTypes();
        $toppings=$this->topping->getAllToppings();
        return view('admin.product.insert', compact('types', 'toppings'));
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
        if(!empty(session()->get('ArrTopping'))){
            $product=$this->product->getLastProductInsert();
            foreach(session()->get('ArrTopping') as $topping){
                $this->detailToppingProduct->insertDetailToppingProduct([
                    'quantity' => 0,
                    'topping_id' => $topping->id,
                    'product_id' => $product->id,
                ]);
            }
        }
        session()->forget('ArrTopping');
        return redirect()->route('admin.product.index');
    }
    public function update($id){
        $product=$this->product->getProduct($id);
        $toppings=$this->topping->getAllToppings();
        $types=$this->type->getAllTypes();
        $detailToppings=$this->detailToppingProduct->getDetailByProduct($id);
        return view('admin.product.update', compact('product','detailToppings','types', 'toppings'));
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
        $this->detailToppingProduct->deleteDetailToppingProductByProduct($id);
        $product=$this->product->deleteProduct($id);
        return redirect()->route('admin.product.index');
    }
    public function insertTopping(Request $request){
        //session()->forget('ArrTopping');
        //session()->forget('ArrTopping');
        if (session()->has('ArrTopping')) {
            // Nếu session 'ArrTopping' đã tồn tại
            $temp = session()->get('ArrTopping');
            $check=false;
            foreach($temp as $topping){
                if($topping->id==$request->get('id')){
                    $check=true;
                }
            }
            if($check!=true){
                $temp[] = $this->topping->getTopping($request->get('id')); // Thêm giá trị mới vào mảng
                session()->put('ArrTopping', $temp); // Lưu lại mảng mới vào session
            }
        } else {
            // Nếu session 'ArrTopping' chưa tồn tại
            session()->put('ArrTopping', [$request->get('id')]); // Tạo mới session 'ArrTopping' với giá trị là mảng chứa id
        }
        $types=$this->type->getAllTypes();
        $toppings=$this->topping->getAllToppings();
        // dd(session()->get('ArrTopping'));
        return view('admin.product.insert', compact('types', 'toppings'));
    }
    public function deleteTopping(Request $request){
        $temp = session()->get('ArrTopping');
        $id = $request->get('id');

        // Tìm vị trí của phần tử trong mảng
        $key = array_search($id, array_column($temp, 'id'));

        if ($key !== false) {
            // Xoá phần tử khỏi mảng
            array_splice($temp, $key, 1);

            // Lưu mảng đã được cập nhật vào session
            session()->put('ArrTopping', $temp);
        }
        $types=$this->type->getAllTypes();
        $toppings=$this->topping->getAllToppings();
        // dd(session()->get('ArrTopping'));
        return view('admin.product.insert', compact('types', 'toppings'));
    }
}
