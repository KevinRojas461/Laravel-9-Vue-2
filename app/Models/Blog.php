<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    // en el array se ponen los dos campos editables
    protected $fillable = ['titulo','contenido'];
}
