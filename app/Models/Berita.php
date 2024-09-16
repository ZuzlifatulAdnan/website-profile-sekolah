<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_upload',
        'users_id',
        'image',
        'kategori',
    ];
    protected $table = 'beritas';
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
