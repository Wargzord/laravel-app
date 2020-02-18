<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criativos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('campanha_id');
            $table->index('campanha_id');
            $table->string('tipo');
            $table->string('urlRedirect');
            $table->string('urlImage');
            $table->string('codCupom')->nullable();
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
        Schema::dropIfExists('criativos');
    }
}
