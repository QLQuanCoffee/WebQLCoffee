<?php
namespace App\Repositories;
use App\Repositories\Interfaces\TypeInterface;
use App\Models\Type;
class TypeRepository implements  TypeInterface{
    public function getAllTypes(){
        return Type::get();
    }
    public function getType($id){
        return Type::find($id);
    }
    public function insertType($data){
        Type::create($data);
    }
    public function updateType($data,$id){
        $type=Type::where('id',$id)->first();
        $type->name=$data['name'];
        $type->save();
    }
    public function deleteType($id){
        $type=Type::find($id);
        $type->delete();
    }
}
