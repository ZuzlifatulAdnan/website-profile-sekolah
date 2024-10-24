<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vidio extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'url',
    ];
    protected $table = 'vidios';
}
