<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaJuegos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();

            //nombre descripcion consola apto para niños precio fecha lanzamiento

            //1.definir los campos de la tabla juegos
            $table->string("nombre",100);
            $table->string("descripcion",200);
            $table->tinyinteger("apto_ninios")->default(0);
            $table->integer("precio")->unsigned();
            $table->date("fecha_lanzamiento");
            //2. agregar la columna de la foranea
            //las claves primarias de laravel (id) por defecto son biginteger y unsigned
            $table->integer("consola_id")->unsigned();
            //3. agregar la relacion
            //ALTER  TABLE ADD CONSTRAINT FOREIGN KEY.....
            $table->foreign("consola_id")->references("id")->on("consolas")->onDelete("cascade");
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
        Schema::dropIfExists('juegos');
    }
}
