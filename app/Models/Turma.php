<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'descricao'];

    public function alunos(): HasMany
    {
        return $this->hasMany(Aluno::class);
    }

}
