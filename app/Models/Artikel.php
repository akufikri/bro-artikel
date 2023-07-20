<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{   protected $table = 'artikels';
    protected $fillable = [
        'id','judul','foto','penulis','deskripsi'
    ];
    use HasFactory;
}