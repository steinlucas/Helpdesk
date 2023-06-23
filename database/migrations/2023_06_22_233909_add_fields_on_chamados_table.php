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
        Schema::table('chamados', function (Blueprint $table) {
            $table->unsignedBigInteger('usuarioAbriu')->default(1);
            $table->foreign('usuarioAbriu')->references('id')->on('usuarios');
            $table->unsignedBigInteger('idatendente')->default(1);
            $table->foreign('idatendente')->references('id')->on('usuarios');
            $table->unsignedBigInteger('idcliente')->default(1);
            $table->foreign('idcliente')->references('id')->on('clientes');

            $table->boolean('status')->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
