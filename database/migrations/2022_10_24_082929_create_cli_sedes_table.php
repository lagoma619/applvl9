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
            $table->integer('sede_id')->primary();
            $table->string('sede_nombre', 100)->nullable();
            $table->string('sede_telefono_contacto', 30)->nullable();
            $table->string('sede_nombre_contacto', 100)->nullable();
            $table->string('sede_direccion', 100)->nullable();
            $table->tinyInteger('sede_id_estado')->nullable();
            $table->string('sede_id_cliente', 30)->nullable()->index('IX_Relationship1');
            $table->timestamps();
            $table->string('sede_origen_destino_recurrente', 300)->nullable();
            $table->string('sede_notas', 500)->nullable();
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
