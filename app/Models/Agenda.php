<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'tanggal_mulai',
        'tanggal_selesai',
        'jam_pelaksanaan',
        'image',
        'penyelenggara',
    ];
    protected $table = 'agendas';
    
}
