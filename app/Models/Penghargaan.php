<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghargaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_upload',
        'users_id',
        'image',
    ];
    protected $table = 'penghargaans';
    public function Users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
