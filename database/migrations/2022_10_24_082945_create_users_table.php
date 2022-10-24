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
            $table->integer('userid')->primary();
            $table->string('numero_documento', 30)->nullable()->unique('users_numero_documento_uindex');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('id_usuestado')->nullable();
            $table->string('nota', 200)->nullable();
            $table->integer('id_tipos_usuario')->nullable();
            $table->integer('id_persona')->nullable();

            $table->foreign('id_persona', 'fk_idpersonas')->references('persona_id')->on('personas');
            $table->foreign('id_tipos_usuario', 'fk_idtiposusuario')->references('tipousu_id')->on('tipos_usuario');
            $table->foreign('id_usuestado', 'fk_idusuarioestados')->references('usuestado_id')->on('usuario_estados');
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
