<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuPromo extends Model
{
    use HasFactory;

    protected $table = 'promo';

    protected $fillable = [
        'nama_promo',
        'gambar_promo',
    ];

    public $timestamps = false;
}


