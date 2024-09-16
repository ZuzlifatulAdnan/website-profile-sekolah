<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_upload',
        'kategori',
        'image',
        'users_id',
    ];
    protected $table = 'ppdbs';

    public function Users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
