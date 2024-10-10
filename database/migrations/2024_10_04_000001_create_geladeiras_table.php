<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeladeirasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('geladeiras', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('nome'); // Nome da geladeira
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geladeiras');
    }
}
