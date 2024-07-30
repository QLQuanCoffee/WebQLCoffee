<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ToppingInterface;
use Illuminate\Http\Request;

class ToppingController extends Controller
{
    private $topping;
    public function __construct(ToppingInterface $toppingInterface){
        $this->topping=$toppingInterface;
    }
    public function index(){
        $toppings=$this->topping->getAllToppings();
        return view('admin.topping.index', compact('toppings'));
    }
    public function insert(){
        return view('admin.topping.insert');
    }
    public function postInsert(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required|'
        ],[
            'name.required' => 'Vui lòng nhập tên topping',
            'price.required' => 'Vui lòng nhập giá'

        ]);
        $this->topping->inserttopping([
            'name' => $request->get('name'),
            'price' => $request->get('price')
        ]);
        return redirect()->route('admin.topping.index');
    }
    public function update($id){
        $topping=$this->topping->gettopping($id);
        if($topping){
            return view('admin.topping.update', compact('topping'));
        }
        return view('admin.topping.index');
    }
    public function postUpdate(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên topping',
            'price.required' => 'Vui lòng nhập giá'

        ]);
        $this->topping->updateTopping([
            'name' => $request->get('name'),
            'price' => $request->get('price')
        ],$request->get('id'));
        return redirect()->route('admin.topping.index');
    }
    public function delete($id){
        $this->topping->deleteTopping($id);
        return redirect()->route('admin.topping.index');
    }
}
