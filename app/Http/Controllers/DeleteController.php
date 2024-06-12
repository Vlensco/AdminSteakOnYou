<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menuModel;
use App\Models\menuPromo;
use App\Models\menuTestimonial;
use App\Models\menuReservation;

class DeleteController extends Controller
{
    public function deletemenu(Request $request)
    {
        $id_produk = $_POST['id_product'];

        $menu = menuModel::where('id_product', $id_produk)->delete();

        if ($menu) {
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Menu berhasil dihapus');

            return response([
                'status' => true,
                "message" => "Menu Berhasil Dihapus",
            ], 200);
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Menu gagal dihapus');

            return response([
                'status' => false,
                "message" => "Menu Gagal Dihapus",
            ], 200);
        }
    }

    public function deletepromo(Request $request)
    {
        $id_produk = $_POST['id_promo'];

        $promo = menuPromo::where('id_promo', $id_produk)->delete();

        if ($promo) {
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Promo berhasil dihapus');

            return response([
                'status' => true,
                "message" => "Promo Berhasil Dihapus",
            ], 200);
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Promo gagal dihapus');

            return response([
                'status' => false,
                "message" => "Promo Gagal Dihapus",
            ], 200);
        }
    }

    public function deletetestimonial(Request $request)
    {
        $id_produk = $_POST['id_feedback'];

        $testimonial = menuTestimonial::where('id_feedback', $id_produk)->delete();

        if ($testimonial) {
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Testimonial berhasil dihapus');

            return response([
                'status' => true,
                "message" => "Testimonial Berhasil Dihapus",
            ], 200);
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Testimonial gagal dihapus');

            return response([
                'status' => false,
                "message" => "Testimonial Gagal Dihapus",
            ], 200);
        }
    }

    public function deletereservation(Request $request)
    {
        $id_produk = $_POST['id_reserve'];

        $reservation = menuReservation::where('id_reserve', $id_produk)->delete();

        if ($reservation) {
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Reservasi berhasil dihapus');

            return response([
                'status' => true,
                "message" => "Reservasi Berhasil Dihapus",
            ], 200);
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Reservasi gagal dihapus');

            return response([
                'status' => false,
                "message" => "Reservasi Gagal Dihapus",
            ], 200);
        }
    }
}
