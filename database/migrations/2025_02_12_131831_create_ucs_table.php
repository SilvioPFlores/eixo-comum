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
        Schema::create('ucs', function (Blueprint $table) {
            $table->id('id');
            $table->string('codigo');
            $table->string('nome');
            $table->integer('eixo_id');
            $table->foreign('eixo_id')
                ->references('id')
                ->on('eixos');
            $table->integer('termo_id');
            $table->foreign('termo_id')
                ->references('id')
                ->on('termos');
            $table->integer('uc_principal');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ucs');
    }
};
