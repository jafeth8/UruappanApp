<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',50);
            $table->string('descripcion');
            $table->string('url_image');
            $table->string('texto_boton',60);
            $table->text('url_boton');
            $table->string('estilo_boton',30);
            //$table->tinyInteger('estado'); // no descomentar!! (probablemente se use en un futuro)
            $table->tinyInteger('orden');
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
        Schema::dropIfExists('sliders');
    }
}
