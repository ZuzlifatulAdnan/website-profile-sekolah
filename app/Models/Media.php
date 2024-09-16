<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kategori',
        'file',
        'users_id',
    ];
    protected $table = 'media';

    public function Users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
