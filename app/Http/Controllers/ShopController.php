<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ShopInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $type;
    public function __construct(ShopInterface $shopInterface)
    {
        $this->type = $shopInterface;
    }
    public function shops()
    {
        $types = $this->type->getAllShops();
        return view('shop');
    }
    public function detailShop($id)
    {
        $shop = $this->type->getAllShops($id);
        return view('detail-Shop');
    }
}
