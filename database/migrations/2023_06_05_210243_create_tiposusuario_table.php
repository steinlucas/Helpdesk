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
        Schema::create('tiposusuario', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->timestamps();
        });

        DB::table('tiposusuario')->insert(
            array(
                'descricao' => 'Administrador'
            )
        );

        DB::table('tiposusuario')->insert(
            array(
                'descricao' => 'Atendente'
            )
        );

        DB::table('tiposusuario')->insert(
            array(
                'descricao' => 'Cliente'
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiposusuario');
    }
};
