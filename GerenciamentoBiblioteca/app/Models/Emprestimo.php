<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'livro_id',
        'usuario_id',
        'dataEmprestimo',
        'dataDevolucao',
        'devolvido',
    ];

    public function livro()
    {
        return $this->belongsTo(Livros::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    protected static function booted()
    {
        static::creating(function ($emprestimo) {
            $emprestimo->dataEmprestimo = now()->format('Y-m-d');
            $emprestimo->dataDevolucao = now()->addWeek()->format('Y-m-d');
        });
    }
}
