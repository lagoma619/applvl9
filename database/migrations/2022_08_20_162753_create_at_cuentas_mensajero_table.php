<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtCuentasMensajeroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_cuentas_mensajero', function (Blueprint $table) {
            $table->string('cod_cuentas_mensajero', 30)->primary();
            $table->string('cod_cuenta', 30)->nullable()->index('in_cuentas_mensajero_cod_cuenta');
            $table->string('cod_mensajero', 30)->nullable()->index('in_cuentas_mensajero_cod_mensajero');
            $table->string('hora_inicio', 30)->nullable();
            $table->string('hora_salida', 30)->nullable();
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
        Schema::dropIfExists('at_cuentas_mensajero');
    }
}
