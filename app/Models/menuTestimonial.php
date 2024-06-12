<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuTestimonial extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'nama_feedback',
        'review_feedback',
        'bintang_feedback',
        'is_admin_validate'
    ];

    public $timestamps = false;
}
