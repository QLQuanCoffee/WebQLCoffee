<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TypeInterface;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    private $type;
    public function __construct(TypeInterface $typeInterface){
        $this->type=$typeInterface;
    }
    public function index(){
        $types=$this->type->getAllTypes();
        return view('admin.type.index', compact('types'));
    }
    public function insert(){
        return view('admin.type.insert');
    }
    public function postInsert(Request $request){
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên loại'
        ]);
        $this->type->insertType([
            'name' => $request->get('name')
        ]);
        return redirect()->route('admin.type.index');
    }
    public function update($id){
        $type=$this->type->getType($id);
        if($type){
            return view('admin.type.update', compact('type'));
        }
        return view('admin.type.index');
    }
    public function postUpdate(Request $request){
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên loại'
        ]);
        $this->type->updateType([
            'name' => $request->get('name'),
        ],$request->get('id'));
        return redirect()->route('admin.type.index');
    }
    public function delete($id){
        $this->type->deleteType($id);
        return redirect()->route('admin.type.index');
    }
}
