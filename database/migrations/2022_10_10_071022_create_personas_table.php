<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_tipo_documento')->nullable();
            $table->string('nombres', 30)->nullable();
            $table->string('apellidos', 30)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('cel_personal', 30)->nullable();
            $table->string('cel_corporativo', 30)->nullable();
            $table->string('direccion', 30)->nullable();
            $table->string('sexo', 30)->nullable();
            $table->timestamps(, 6);
            $table->string('fecha_nacimiento', 30)->nullable();
            $table->string('ciudad', 20)->nullable();
            $table->string('notapersona', 500)->nullable();
            
            $table->foreign('id_tipo_documento', 'fk_idtipodocumento')->references('id')->on('tipos_documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
