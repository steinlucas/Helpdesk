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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj');
            $table->unique('cnpj');
            $table->string('nome');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        DB::table('clientes')->insert(
            array(
                'cnpj' => '47174863000149',
                'nome' => 'Lucas Stein Tecnologias'
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
