<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('userid', 30)->primary();
            $table->string('numero_documento', 30)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('id_usuestado')->nullable();
            $table->string('nota', 200)->nullable();
            $table->integer('id_tipos_usuario')->nullable();
            $table->integer('id_personas')->nullable();

            $table->foreign('id_personas', 'fk_idpersonas')->references('id')->on('personas');
            //$table->foreign('id_usuestado', 'fk_idusuestados')->references('id')->on('usuario_estados');
            $table->foreign('id_tipos_usuario', 'fk_idtiposusuario')->references('id')->on('tipos_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
