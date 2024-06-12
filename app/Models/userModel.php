<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $fillable = [
        'username',
        'password',
        'nama_admin'
    ];

    public $timestamps = false;
}
