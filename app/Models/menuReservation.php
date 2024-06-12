<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuReservation extends Model
{
    use HasFactory;

    protected $table = 'reserve';

    protected $fillable = [
        'name',
        'email',
        'total_guest',
        'date',
        'time',
        'is_admin_validate',
    ];

    public $timestamps = false;
}
