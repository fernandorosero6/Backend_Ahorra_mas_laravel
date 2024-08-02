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
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');


            $table->unsignedBigInteger('presupuesto_id');

            $table->foreign('presupuesto_id')
            ->references('id')
            ->on('presupuestos')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('contador_id');

            $table->foreign('contador_id')
            ->references('id')
            ->on('contadors')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historials');
    }
};
