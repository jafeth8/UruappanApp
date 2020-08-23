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
            $table->id();
            $table->string('name');
            /*-------------------------------------- */
            $table->text('descripcion')->nullable();
            $table->string('categoria')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('telefono')->nullable();
            $table->text('facebook_url')->nullable();
            $table->string('logo')->nullable();
            $table->string('imagen_portada')->nullable();
            $table->integer('imagenes_galeria')->unsigned()->nullable();//este campo solo es de referencia para determinar si se han agregado la galeria de imagenes  
            //$table->string('url');
            /*-------------------------------------- */
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['admin','customer'])->default('customer');
            $table->rememberToken();
            $table->timestamps();
            //$table->softDeletes();
            /*---------------------------------------- */
            $table->tinyInteger('estado')->default(0);
            /*---------------------------------------- */
            
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
