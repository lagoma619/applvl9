<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCliAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cli_areas', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nombre', 300)->nullable();
            $table->string('id_cliente', 30)->nullable();
            $table->string('telefono_contacto', 30)->nullable();
            $table->string('nombre_contacto', 300)->nullable();
            $table->string('origen_destino_recurrente', 300)->nullable();
            $table->tinyInteger('estado')->nullable();
            $table->string('id_sede', 30)->nullable()->index('IX_Relationship2');
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
        Schema::dropIfExists('cli_areas');
    }
}
