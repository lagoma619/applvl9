<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->string('id', 30)->primary();
            $table->string('nombre', 30)->nullable();
            $table->string('ubicacion', 30)->nullable();
            $table->string('numero_telefono', 30)->nullable();
            $table->string('nombre_contacto', 30)->nullable();
            $table->string('origen_destino_recurrente', 30)->nullable();
            $table->string('estado', 30)->nullable();
            $table->string('cod_sede', 30)->nullable()->index('IX_Relationship2');
            $table->timestamps( );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
