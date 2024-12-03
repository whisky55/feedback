<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks'; // Nome correto da tabela, se for diferente do padrão
    protected $fillable = ['comentario', 'estrela', 'geladeira_id'];

    // Definindo o relacionamento com o modelo Geladeira
    public function geladeira()
    {
        return $this->belongsTo(Geladeira::class); // Relacionamento de feedback com geladeira
    }
}
