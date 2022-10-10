<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCliSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cli_sedes', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nombre', 100)->nullable();
            $table->string('telefono_contacto', 30)->nullable();
            $table->string('nombre_contacto', 100)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->tinyInteger('id_estado')->nullable();
            $table->string('id_cliente', 30)->nullable()->index('IX_Relationship1');
            $table->timestamps();
            $table->string('origen_destino_recurrente', 300)->nullable();
            $table->string('notas', 500)->nullable();
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
