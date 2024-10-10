<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks'; // Defina o nome correto da tabela
    protected $fillable = ['comentario', 'estrela', 'geladeira_id']; // Adicione os campos aqui
}
