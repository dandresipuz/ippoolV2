<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWansolarwindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wansolarwinds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vlanid')->unique();
            $table->unsignedBigInteger('vprn')->unique();
            $table->string('redwanuno');
            $table->string('redwandos');
            $table->string('ipbogrtdntres');
            $table->string('ipboggcuno');
            $table->string('ipbog41000');
            $table->string('ipboggcdos');
            $table->boolean('estado')->default(0);
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes');
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
        Schema::dropIfExists('wansolarwinds');
    }
}
