<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_estado_domicilio')->nullable();
            $table->string('asignado_a', 30)->nullable();
            $table->string('origen', 30)->nullable();
            $table->string('destino', 30)->nullable();
            $table->string('descripcion', 30)->nullable();
            $table->string('fecha_inicio', 30)->nullable();
            $table->string('fecha_fin', 30)->nullable();
            $table->string('notas', 30)->nullable();
            $table->tinyInteger('efectivo_entrega')->nullable();
            $table->integer('efectivo_monto')->nullable();
            $table->integer('id_cliente')->nullable()->index('IX_Relationship5');
            $table->integer('id_tipo_vehiculo')->nullable()->index('IX_Relationship2');
            $table->integer('id_tipo_servicio')->nullable()->index('IX_Relationship3');
            $table->timestamps();
            $table->integer('id_userid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domicilios');
    }
}
