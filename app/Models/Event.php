<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'image',
        'users_id',
    ];
    protected $table = 'events';

    public function Users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
