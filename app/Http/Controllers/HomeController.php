<?php

namespace App\Http\Controllers;

use App\Models\menuModel;
use App\Models\menuPromo;
use App\Models\menuTestimonial;
use App\Models\menuReservation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (session()->has('username')) {
            return view('/dashboard');
        } else {
            return redirect('/login');
        }
    }

    public function menu()
    {
        $daftarMenu = menuModel::all();

        $data = [
            'daftarMenu' => $daftarMenu
        ];
        return view('menu', $data);
    }

    public function promo()
    {
        $daftarPromo = menuPromo::all();

        $data = [
            'daftarPromo' => $daftarPromo
        ];
        return view('promo', $data);
    }

    public function testimonial()
    {
        $testimonial = menuTestimonial::all();

        $data = [
            'testimonial' => $testimonial
        ];
        return view('testimonial', $data);
    }

    public function reservation()
    {
        $reservation = menuReservation::all();

        $data = [
            'reservation' => $reservation
        ];
        return view('reservation', $data);
    }

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }    

}
