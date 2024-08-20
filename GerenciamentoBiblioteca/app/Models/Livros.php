<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Livros extends Model
{
    use Notifiable, HasFactory;
    protected $fillable = [
        'titulo', 'autor', 'anoPublicacao', 'disponivel', 'img',
    ];

}
