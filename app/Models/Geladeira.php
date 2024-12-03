<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geladeira extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao']; // Ajuste os campos conforme necessário

    // Relacionamento com o modelo Feedback
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class); // Relacionamento de uma geladeira para muitos feedbacks
    }
}
