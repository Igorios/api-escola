<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'nascimento', 'genero', 'turma_id'];

    public function turma(): BelongsTo 
    {
        return $this->belongsTo(Turma::class);
    }

}
