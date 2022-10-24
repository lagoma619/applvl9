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
            $table->string('domicilio_asignado_a', 300)->nullable();
            $table->string('domicilio_origen', 300)->nullable();
            $table->string('domicilio_destino', 300)->nullable();
            $table->string('domicilio_descripcion', 3000)->nullable();
            $table->string('domicilio_fecha_inicio', 30)->nullable();
            $table->time('domicilio_hora_inicio')->nullable();
            $table->string('domicilio_fecha_fin', 30)->nullable();
            $table->time('domicilio_hora_entrega_real')->nullable();
            $table->tinyInteger('domicilio_efectivo_entrega')->nullable();
            $table->integer('domicilio_efectivo_monto')->nullable();
            $table->integer('domicilio_id_tipo_vehiculo')->nullable()->index('IX_Relationship2');
            $table->integer('domicilio_id_tipo_servicio')->nullable()->index('IX_Relationship3');
            $table->date('domicilio_fecha_solicitud')->nullable();
            $table->time('domicilio_hora_solicitud')->nullable();
            $table->date('domicilio_fecha_entrega_solicita')->nullable();
            $table->time('domicilio_hora_entrega_solicita')->nullable();
            $table->integer('domicilio_id_cliente')->nullable()->index('IX_Relationship5');
            $table->integer('domicilio_id_userid')->nullable();
            $table->string('domicilio_notas', 300)->nullable();
            $table->timestamps();
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
