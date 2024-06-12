<?php

namespace App\Http\Controllers;

use App\Models\menuModel;
use App\Models\menuPromo;
use App\Models\menuTestimonial;
use App\Models\menuReservation;
use App\Models\userModel;
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

    public function prosesLogin(Request $request)
    {
        $username = request('username');
        $password = request('password');

        $user = userModel::where('username', $username)->where('password', md5($password))->first();
        if ($user) {
            session()->put('username', $username);
            session()->put('password', $password);
            session()->flash('icon', 'success');
            session()->flash('title', 'Berhasil');
            session()->flash('message', 'Selamat Datang ' . $username);

            return redirect('/');
        } else {
            session()->flash('icon', 'error');
            session()->flash('title', 'Gagal');
            session()->flash('message', 'Username atau password salah');

            return redirect('/login');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }

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
