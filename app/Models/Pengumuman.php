<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_upload',
        'users_id',
    ];
    protected $table = 'pengumumen';

    public function Users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
