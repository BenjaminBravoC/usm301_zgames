<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaConsolas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //modelo orientado a objetos
        //base de datos relacional + programacion orientadaba a objetos
        // MySql + eloquent (ORM del modelo de laravel) Object relational mapping
        //crear clase pa quue se cree sola la tabla
        Schema::create('consolas', function (Blueprint $table) {
            $table->id(); //Secuencias,  autoincrementales
            //Autoincrementales: Claves unicas generadas automaticamente por el motor
            $table->string("nombre",150);
            $table->string("marca",50);
            $table->integer("anio");
            $table->timestamps(); //dos campos que son el created_at y el updated_at, para obtener un registro de lo ultimo que se modifico
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consolas');
    }
}
