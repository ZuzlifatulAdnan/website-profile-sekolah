<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'posisi',
        'image',
        'email',
        'no_telp',
    ];
    protected $table = 'staff';
}
