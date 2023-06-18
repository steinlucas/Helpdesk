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
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            $table->integer('seqtramite');
            $table->unsignedBigInteger('idusuario')->default(1);
            $table->foreign('idusuario')->references('id')->on('usuarios');
            $table->unsignedBigInteger('idchamado')->default(1);
            $table->foreign('idchamado')->references('id')->on('chamados');
            $table->text('descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramites');
    }
};
