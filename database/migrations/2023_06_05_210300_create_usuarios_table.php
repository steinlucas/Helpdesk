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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->unique('username');
            $table->string('password');
            $table->string('nome');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->unsignedBigInteger('idtipousuario')->default('1');
            $table->foreign('idtipousuario')->references('id')->on('tiposusuario');
        });

        DB::table('usuarios')->insert(
            array(
                'username' => 'admin',
                'password' => '$2a$04$ZPrDCO3zE71EV3Uzpijd/eJAfXpHHKhvWpMVZmJDvSDLpSXcxoL.G',
                'nome' => 'Admin',
                'status' => true,
                'idtipousuario' => 1,
                'created_at' =>  \Carbon\Carbon::now(), # new \Datetime()
                'updated_at' => \Carbon\Carbon::now(),  # new \Datetime()
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
