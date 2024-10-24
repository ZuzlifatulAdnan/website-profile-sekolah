<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriBerita extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
    ];
    protected $table = 'kategori_beritas';
    public function berita()
    {
        return $this->hasMany(Berita::class); // Menghubungkan dengan model Berita
    }
}
