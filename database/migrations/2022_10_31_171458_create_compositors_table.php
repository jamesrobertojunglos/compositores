<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompositorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compositors', function (Blueprint $table) {
            $table->id();
            $table->string('nome',200);
            $table->string('ano',200);
            $table->string('origem',50);
            $table->string('resumo',5000);
            $table->string('obras',5000);
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
        Schema::dropIfExists('compositors');
    }
}
