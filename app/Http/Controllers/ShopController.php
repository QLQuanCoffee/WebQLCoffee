<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Repositories\Interfaces\ShopInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $shop, $count;
    public function __construct(ShopInterface $shopInterface)
    {
        $this->shop = $shopInterface;
    }
    public function shops()
    {
        $shops = $this->shop->getAllShops();
        $count = $this->shop->getAllShops()->count();
        return view('shop', compact('shops', 'count'));
    }

    public function detailShop($id)
    {
        $shop = $this->shop->getShop($id);
        return view('detail-Shop', compact('shop'));
    }
    public function index(){
        $shops=$this->shop->getAllShops();
        return view('admin.shop.index', compact('shops'));
    }
    public function insert(){

        return view('admin.shop.insert');
    }
    public function postInsert(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'time' => 'required',
            'photo' => 'required',
            'link_map' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên cửa hàng',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'description.required' => 'Vui lòng nhập thông tin cửa hàng',
            'time.required' => 'Vui lòng nhập thời gian hoạt động',
            'photo.required' =>'Vui lòng chọn ảnh sản phẩm',
            'link_map.required' => 'Vui lòng nhập link map cửa hàng'
        ]);
        if($request->hasFile('photo')){
            $extension=$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('images/shops',$extension);
        }
        $this->shop->insertShop([
            'name' => $request->get('name'),
            'address'=> $request->get('address'),
            'description'=> $request->get('description'),
            'time'=> $request->get('time'),
            'photo'=> $extension,
            'link_map'=> $request->get('link_map'),
        ]);
        return redirect()->route('admin.shop.index');
    }
    public function update($id){
        $shop=$this->shop->getShop($id);
        return view('admin.shop.update', compact('shop'));
    }
    public function postUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'time' => 'required',
            'link_map' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên cửa hàng',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'description.required' => 'Vui lòng nhập thông tin cửa hàng',
            'time.required' => 'Vui lòng nhập thời gian hoạt động',
            'link_map.required' => 'Vui lòng nhập link map cửa hàng'
        ]);
        $shop=$this->shop->getshop($request->get('id'));
        if($request->hasFile('photo')){
            $filePath='images/shops/'.$shop->photo;
            Storage::delete($filePath);
            $extension=$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('images/shops',$extension);
        }
        $this->shop->updateShop([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'description' => $request->get('description'),
            'time'=>$request->get('time'),
            'photo' => $request->hasFile('photo')? $extension: $shop->photo,
            'link_map' => $request->get('link_map'),
        ], $shop->id);
        return redirect()->route('admin.shop.index');
    }
    public function delete($id){
        $shop=$this->shop->deleteShop($id);
        return redirect()->route('admin.shop.index');
    }
}
