<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->string('id', 30)->primary();
            $table->string('contrasena', 30)->nullable();
            $table->string('estado', 30)->nullable();
            $table->string('nota', 30)->nullable();
            $table->string('cod_persona', 30)->nullable()->index('in_cuentas_cod_persona');
            $table->string('cod_tipos_cuenta', 30)->nullable()->index('in_cuentas_cod_tipos_cuenta');
            $table->timestamps( );
            $table->string('cod_cliente', 30)->nullable()->index('re_cliente_cuenta_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas');
    }
}
