<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fin_movimento extends Model
{
    use HasFactory;
    protected $fillable = [
        'descricao',
        'valor',
        'tipo',
        'user_id'
    ];
    // Definir relacionamento com tabela de usuários - função com o nome do Model
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
}
