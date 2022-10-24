<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtDomiciliosHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_domicilios_historial', function (Blueprint $table) {
            $table->string('cod_domicilios_historial', 30)->primary();
            $table->bigInteger('consecutivo')->nullable();
            $table->bigInteger('ubicacion')->nullable();
            $table->bigInteger('fecha_ubicacion')->nullable();
            $table->string('cod_domicilio', 30)->nullable()->index('IX_Relationship5');
            $table->string('cod_cliente', 30)->nullable()->index('IX_Relationship6');
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
        Schema::dropIfExists('at_domicilios_historial');
    }
}
