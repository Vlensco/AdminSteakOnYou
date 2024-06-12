<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddController extends Controller
{
    public function addmenu()
    {
        return view('addmenu');
    }

    public function addpromo()
    {
        return view('addpromo');
    }

    public function addtestimonial()
    {
        return view('addtestimonial');
    }

    public function addreservation()
    {
        return view('addreservation');
    }
}
