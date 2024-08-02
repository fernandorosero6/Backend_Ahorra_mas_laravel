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
        Schema::create('contador_reporte_daños', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('contador_id')->nullable();
            $table->unsignedBigInteger('reporte_daño_id')->nullable();

            $table->foreign('contador_id')
                    ->references('id')
                    ->on('contadors')
                    ->onDelete('cascade');

            $table->foreign('reporte_daño_id')
                    ->references('id')
                    ->on('reporte_daños')
                    ->onDelete('cascade');
                    

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contador_reporte_daños');
    }
};
