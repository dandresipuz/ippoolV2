<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAliadoCentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aliado_cent', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aliado_id')->nullable();
            $table->foreign('aliado_id')->references('id')->on('aliados');
            $table->unsignedBigInteger('centralizador_id')->nullable();
            $table->foreign('centralizador_id')->references('id')->on('centralizadors');
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
        Schema::dropIfExists('aliado_cent');
    }
}
