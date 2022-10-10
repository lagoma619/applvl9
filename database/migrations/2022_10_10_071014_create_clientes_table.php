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
            $table->integer('id')->primary();
            $table->string('nombre', 30)->nullable();
            $table->string('nombre_comercial', 30)->nullable();
            $table->integer('id_tipo_documento')->nullable();
            $table->string('numero_documento', 30)->nullable();
            $table->string('telefono', 12)->nullable();
            $table->date('inicio_contrato')->nullable();
            $table->string('email', 30)->nullable();
            $table->string('direccion', 30)->nullable();
            $table->string('ciudad', 20)->nullable();
            $table->string('contacto', 30)->nullable();
            $table->string('telefono_contacto', 12)->nullable();
            $table->time('horario_inicio')->nullable();
            $table->time('horario_fin')->nullable();
            $table->timestamps();
            $table->string('pagina_web', 30)->nullable();
            $table->string('notas', 500)->nullable();
            $table->integer('id_estado')->nullable();
            
            $table->foreign('id_tipo_documento', 'fk_idtiposdocumento')->references('id')->on('tipos_documento');
            $table->foreign('id_estado', 'fk_idusuestado')->references('id')->on('usuario_estados');
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
