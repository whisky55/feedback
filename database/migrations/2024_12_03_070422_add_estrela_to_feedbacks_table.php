<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('feedbacks', function (Blueprint $table) {
        $table->integer('estrela')->nullable(); // ou 'integer' dependendo do tipo de dado
    });
}

public function down()
{
    Schema::table('feedbacks', function (Blueprint $table) {
        $table->dropColumn('estrela');
    });
}

};
