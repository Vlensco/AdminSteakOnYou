<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menuModel;
use App\Models\menuPromo;
use App\Models\menuTestimonial;
use App\Models\menuReservation;

class SaveController extends Controller
{
    public function saveeditedmenu()
    {
        $id = request('id_menu');
        $data = [
            'nama' => request('nama'),
            'harga' => request('harga'),
            'kategori' => request('kategori')
        ];

        $menu = menuModel::where('id_product', $id)->update($data);


        if ($menu) {
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Menu berhasil diedit');

            return redirect('/menu');
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Menu gagal diedit');

            return redirect('/menu');
        }
    }

    public function saveeditedpromo(Request $request)
    {

        $name = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->storeAs('public/theme/promo/', $name);

        $id = request('id_promo');
        $data = [
            'nama_promo' => request('nama'),
            'gambar_promo' => $name,
        ];

        $promo = menuPromo::where('id_promo', $id)->update($data);


        if ($promo) {
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Promo berhasil diedit');

            return redirect('/promo');
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Promo gagal diedit');

            return redirect('/promo');
        }
    }

    public function savemenu()
    {
        $data = [
            'nama' => request('nama'),
            'harga' => request('harga'),
            'kategori' => request('kategori')
        ];

        $menu = menuModel::create($data);

        // insert into menu (id_product, nama, harga, kategori) values (3, 'Teh Obeng', 6000, 'Drink & Beverages');
        

        if ($menu) {
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Menu berhasil ditambahkan');

            return redirect('/menu');
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Menu gagal ditambahkan');

            return redirect('/menu');
        }
    }

    public function savepromo(Request $request)
    {
        $name = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->storeAs('public/theme/promo/', $name);
        $data = [
            'nama_promo' => request('nama'),
            'gambar_promo' => $name,
        ];

        $promo = menuPromo::create($data);

        // insert into promo (id_promo, nama_promo, gambar_promo) values (2, 'Juni', 'juni.jpg');


        if ($promo) {
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Promo berhasil ditambahkan');

            return redirect('/promo');
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Promo gagal ditambahkan');

            return redirect('/promo');
        }
    }

    public function savetestimonial()
    {
        $data = [
            'nama_feedback' => request('nama'),
            'review_feedback' => request('komentar'),
            'bintang_feedback' => request('bintang'),
        ];

        $testimonial = menuTestimonial::create($data);

        // insert into feedback (id_feedback, nama_feedback, review_feedback, bintang_feedback) values (4, 'Jimmy', 'Enak', 5);


        if ($testimonial) {
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Testimonial berhasil ditambahkan');

            return redirect('/testimonial');
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Testimonial gagal ditambahkan');

            return redirect('/testimonial');
        }
    }

    public function savereservation()
    {
        $data = [
            'name' => request('nama'),
            'email' => request('email'),
            'total_guest' => request('total'),
            'date' => request('tanggal'),
            'time' => request('waktu'),
        ];

        $reservation = menuReservation::create($data);

         // insert into reserve (id_reserve, name, email, total_guest, date, time) values (5, 'Wili', 'wili@gmail.com', 1, '2024-05-27', '17:43');


        if ($reservation) {
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Testimonial berhasil ditambahkan');

            return redirect('/reservation');
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Testimonial gagal ditambahkan');

            return redirect('/reservation');
        }
    }
}
