<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ShopInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $type, $count;
    public function __construct(ShopInterface $shopInterface)
    {
        $this->type = $shopInterface;
    }
    public function shops()
    {
        $types = $this->type->getAllShops();
        $count = $this->type->getAllShops()->count();
        return view('shop', compact('types', 'count'));
    }

    public function detailShop($id)
    {
        $shop = $this->type->getShop($id);
        return view('detail-Shop', compact('shop'));
    }
}
