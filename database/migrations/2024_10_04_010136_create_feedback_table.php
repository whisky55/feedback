<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('geladeira_id')->constrained()->onDelete('cascade')->index();
            $table->text('comentario'); // Alterado para text, caso precise de mais espaço
            $table->unsignedTinyInteger('estrelas'); // Avaliação de 1 a 5
            $table->text('resposta')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Para soft deletes (opcional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};

