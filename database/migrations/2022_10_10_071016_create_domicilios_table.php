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
            $table->integer('domicilio_id')->primary();
            $table->integer('domicilio_id_estado_domicilio')->nullable();
            $table->string('domicilio_asignado_a', 30)->nullable();
            $table->string('domicilio_origen', 30)->nullable();
            $table->string('domicilio_destino', 30)->nullable();
            $table->string('domicilio_descripcion', 30)->nullable();
            $table->string('domicilio_fecha_inicio', 30)->nullable();
            $table->string('domicilio_fecha_fin', 30)->nullable();
            $table->string('domicilio_notas', 30)->nullable();
            $table->tinyInteger('domicilio_efectivo_entrega')->nullable();
            $table->integer('domicilio_efectivo_monto')->nullable();
            $table->integer('domicilio_id_cliente')->nullable()->index('IX_Relationship5');
            $table->integer('domicilio_id_tipo_vehiculo')->nullable()->index('IX_Relationship2');
            $table->integer('domicilio_id_tipo_servicio')->nullable()->index('IX_Relationship3');
            $table->timestamps();
            $table->integer('domicilio_id_userid')->nullable();
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
