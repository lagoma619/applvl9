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
            $table->string('id', 30)->primary();
            $table->string('id_estado_domicilio', 30)->nullable();
            $table->string('asignado_a', 30)->nullable();
            $table->string('origen', 30)->nullable();
            $table->string('destino', 30)->nullable();
            $table->string('descripcion', 30)->nullable();
            $table->string('fecha_inicio', 30)->nullable();
            $table->string('fecha_fin', 30)->nullable();
            $table->string('notas', 30)->nullable();
            $table->tinyInteger('efectivo_entrega')->nullable();
            $table->string('id_cliente', 30)->nullable()->index('IX_Relationship5');
            $table->string('id_tipo_vehiculo', 30)->nullable()->index('IX_Relationship2');
            $table->string('id_tipo_servicio', 30)->nullable()->index('IX_Relationship3');
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
        Schema::dropIfExists('domicilios');
    }
}
