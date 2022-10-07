<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cli_sedes', function (Blueprint $table) {
            $table->string('id', 30)->primary();
            $table->string('nombre', 30)->nullable();
            $table->string('direccion', 30)->nullable();
            $table->string('telefono_contacto', 30)->nullable();
            $table->string('nombre_contacto', 30)->nullable();
            $table->string('origen_destino_recurrente', 30)->nullable();
            $table->string('id_estado', 30)->nullable();
            $table->string('id_cliente', 30)->nullable()->index('IX_Relationship1');
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
        Schema::dropIfExists('cli_sedes');
    }
}
