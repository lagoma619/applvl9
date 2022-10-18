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
            $table->integer('persona_id')->primary();
            $table->integer('persona_id_tipo_documento')->nullable();
            $table->string('persona_nombres', 30)->nullable();
            $table->string('persona_apellidos', 30)->nullable();
            $table->string('persona_email', 200)->nullable();
            $table->string('persona_cel_personal', 30)->nullable();
            $table->string('persona_cel_corporativo', 30)->nullable();
            $table->string('persona_direccion', 30)->nullable();
            $table->string('persona_sexo', 30)->nullable();
            $table->timestamps(, 6);
            $table->string('persona_fecha_nacimiento', 30)->nullable();
            $table->string('persona_ciudad', 20)->nullable();
            $table->string('persona_nota', 500)->nullable();

            $table->foreign('persona_id_tipo_documento', 'fk_idtipodocumento')->references('id')->on('tipos_documento');
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
