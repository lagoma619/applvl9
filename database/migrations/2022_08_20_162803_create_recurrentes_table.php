<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecurrentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recurrentes', function (Blueprint $table) {
            $table->string('id', 30)->primary();
            $table->string('sede_recurrente', 30)->nullable();
            $table->string('area_recurrente', 30)->nullable();
            $table->string('cod_sede', 30)->nullable()->index('IX_Relationship3');
            $table->string('cod_area', 30)->nullable()->index('IX_Relationship4');
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
        Schema::dropIfExists('recurrentes');
    }
}
