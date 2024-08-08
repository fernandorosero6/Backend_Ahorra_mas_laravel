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
        Schema::create('contadors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_contador');
            $table->integer('num_contador');
            $table->string('barrio');
            $table->string('direccion');
            $table->integer('estrato');
            $table->string('categoria');
            $table->integer('tarifa_agua');
            $table->integer('tarifa_alcantarillado');
            $table->integer('ultimo_consumo');
            $table->string('fecha_proximo_pago');
            $table->boolean('estado')->nullable();
            $table->boolean('tipo_contador')->nullable();               
                 
        
            // $table->unsignedBigInteger('user_id');

            // $table->foreign('user_id')
            //       ->references('id')
            //       ->on('users')
            //       ->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contadors');
    }
};
