<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'image',
        'alt_text',
        'display-order',
        'status',
    ];
    protected $table = 'heroes';
}
