<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

//importar modelo
use App\Models\Consola;

//Aqui va toda la lógica vinculada a las consolas
class ConsolasController extends Controller
{
    public function getMarcas(){
        $marcas = array(); //$marcas = ["Sony","Microsoft","Nintendo","Sega"];
        $marcas[] = "Sony";
        $marcas[] = "Microsoft";
        $marcas[] = "Nintendo";
        $marcas[] = "Sega";

        return $marcas;
    }
    /**
    *Esta funciona va a ir a buscar todas las consolas que existen en la bd
    *una request
    */
    public function getConsolas(){
        //Equivalente a un SELECT * FROM consolas
        $consolas = Consola::all();
        return $consolas;
    }

    public function filtrarConsolas(Request $request){
        $input = $request->all();
        $filtro = $input["filtro"];
        $consolas = Consola::where("marca", $filtro)->get();
        //SELECT * FROM consolas WHERE marca = $filtro
        return $consolas;
    }

    /**
    *Esta funcion va a registrar una consola de ejemplo en la BD
    *una request es un objeto de php que permite acceder a las cosas que me mandaron
    *desde la interfaz (desde el formulario)
    *CUANDO EL METODO RECIBE COSAS EL REQUEST VA EN LOS PARENTESIS
    */
    public function crearConsola(Request $request){
        //Equivalente a un INSER INTO bla bla
        $input = $request->all(); // genera un arreglo con todo lo que mando la interfaz
        // cuando hablo de interfaz hablo de javascript
        $consola = new Consola();
        $consola->nombre = $input["nombre"];
        $consola->marca = $input ["marca"];
        $consola->anio = $input["anio"];

        $consola->save();
        return $consola;
    }


    public function eliminarConsola(Request $request){
        $input = $request ->all();
        $id = $input["id"];
        //eloquent: el administrador de bd de laravel se llama eloquent
        //1. ir a buscar el registro a la bd
        // $console = App\Models\Consola::findOrFail(2)
        $consola = Consola::findOrFail($id);
        //2. para eliminar llamo al metodo delete
        $consola->delete(); // DELETE FROM consolas WHERE ID=1
        return "ok";
    }

}

// view productos.blade.php
// redenrizar los productos

//ProductosController:
// - ir a buscar los productos a la BD
// - Filtra por los disponibles
// - formatea el precio
// retorna lista de productos
