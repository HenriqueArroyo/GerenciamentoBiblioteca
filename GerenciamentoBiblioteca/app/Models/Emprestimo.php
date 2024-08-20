<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Emprestimo extends Model
{
    use Notifiable, HasFactory;
    protected $fillable = [
        'dataEmprestimo', 'dataDevolucao', 'livroId', 'usuarioId', 'devolvido',
    ];
}
