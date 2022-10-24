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
            $table->integer('cliente_id')->primary();
            $table->string('cliente_nombre', 30)->nullable();
            $table->string('cliente_nombre_comercial', 30)->nullable();
            $table->integer('cliente_id_tipo_documento')->nullable();
            $table->string('cliente_numero_documento', 30)->nullable();
            $table->string('cliente_telefono', 12)->nullable();
            $table->date('cliente_inicio_contrato')->nullable();
            $table->string('cliente_email', 30)->nullable();
            $table->string('cliente_direccion', 30)->nullable();
            $table->string('cliente_ciudad', 20)->nullable();
            $table->string('cliente_contacto', 30)->nullable();
            $table->string('cliente_telefono_contacto', 12)->nullable();
            $table->time('cliente_horario_inicio')->nullable();
            $table->time('cliente_horario_fin')->nullable();
            $table->timestamps();
            $table->string('cliente_pagina_web', 30)->nullable();
            $table->string('cliente_notas', 500)->nullable();
            $table->integer('cliente_id_estado')->nullable();
            
            $table->foreign('cliente_id_tipo_documento', 'fk_idtiposdocumento')->references('tipodocumento_id')->on('tipos_documento');
            $table->foreign('cliente_id_estado', 'fk_idusuestado')->references('usuestado_id')->on('usuario_estados');
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
