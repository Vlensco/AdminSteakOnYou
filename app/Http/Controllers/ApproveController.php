<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menuTestimonial;
use App\Models\menuReservation;

class ApproveController extends Controller
{
    public function approveTestimonial(Request $request)
    {
        $id_produk = $request->id_feedback;
        $status = $request->is_admin_validate;
        $data = [
                'is_admin_validate' => $status
            ];
            
        $testimonial = menuTestimonial::where('id_feedback', $id_produk)->update($data);
        // return response($testimonial, 200);
            
        if ($testimonial > 0) {
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            if ($status == '1') {
                session()->flash('message', 'Testimonial berhasil diapprove');
            } else {
                session()->flash('message', 'Testimonial berhasil ditolak');
            }
            return response([
                'status' => true,
                "message" => "Testimonial Berhasil Diapprove",
            ], 200);
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            if ($status == '1') {
                session()->flash('message', 'Testimonial gagal diapprove');
            } else {
                session()->flash('message', 'Testimonial gagal ditolak');
            }
            return response([
                'status' => false,
                "message" => "Testimonial Gagal Diapprove",
            ], 200);
        }
    }

    public function approveReservation(Request $request)
    {
        $id_produk = $request->id_reserve;
        $status = $request->is_admin_validate;
        $data = [
                'is_admin_validate' => $status
            ];
            
        $reservation = menuReservation::where('id_reserve', $id_produk)->update($data);
        // return response($testimonial, 200);
            
        if ($reservation > 0) {
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            if ($status == '1') {
                session()->flash('message', 'Testimonial berhasil diapprove');
            } else {
                session()->flash('message', 'Testimonial berhasil ditolak');
            }
            return response([
                'status' => true,
                "message" => "Testimonial Berhasil Diapprove",
            ], 200);
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            if ($status == '1') {
                session()->flash('message', 'Testimonial gagal diapprove');
            } else {
                session()->flash('message', 'Testimonial gagal ditolak');
            }
            return response([
                'status' => false,
                "message" => "Testimonial Gagal Diapprove",
            ], 200);
        }
    }
}
