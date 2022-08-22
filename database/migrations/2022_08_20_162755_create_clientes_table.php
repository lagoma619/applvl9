<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('id', 30)->primary();
            $table->string('nombre', 30)->nullable();
            $table->string('nombre_comercial', 30)->nullable();
            $table->string('tipo_documento', 30)->nullable();
            $table->string('numero_documento', 30)->nullable();
            $table->string('telefono', 12)->nullable();
            $table->date('inicio_contrato')->nullable();
            $table->string('correo_electronico', 30)->nullable();
            $table->string('direccion', 30)->nullable();
            $table->string('ciudad', 20)->nullable();
            $table->string('contacto', 30)->nullable();
            $table->string('telefono_contacto', 12)->nullable();
            $table->time('horario_inicio')->nullable();
            $table->time('horario_fin')->nullable();
            $table->timestamps( );
            $table->string('pagina_web', 30)->nullable();
            $table->string('numero_telefono', 30)->nullable();
            $table->string('notas', 30)->nullable();
            $table->string('estado', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
