<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menuPromo;
use App\Models\menuModel;

class EditController extends Controller
{
    public function editmenu($id)
    {
        $menu = menuModel::where('id_product', $id)->first();

        $data = [
            'menu' => $menu
        ];
        return view('editmenu', $data);
    }
    
    public function editpromo($id)
    {
        $promo = menuPromo::where('id_promo', $id)->first();

        $data = [
            'promo' => $promo
        ];
        return view('editpromo', $data);
    }

}
