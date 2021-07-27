<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
class JuegosController extends Controller
{
    //va a obtener los juegos a partir de un id de consola


    public function getJuegosByConsola(Request $request){
        $input = $request->all();
        $idConsola = $input["idConsola"];
        $consola = Consola::find($idConsola);
        return $consola->juegos()->get();
        

    }
    // devolver todos los juegos del sistema
    public function getJuegos(){
        return Juego::all();

    }
    // crear un nuevo juego
    public function save(Request $request){
        $input = $request->all();
        $nombre = $input["nombre"];
        $fecha = $input["fecha_lanzamiento"];
        $apto = $input["apto_ninios"];
        $precio = $input["precio"];
        $descripcion = $input["descripcion"];
        $consolaId =$input["consolaId"];

        $juego = new Juego();
        $juego ->nombre = $nombre;
        $juego->fecha_lanzamiento = $fecha;
        $juego->descripcion = $descripcion;
        $juego ->apto_ninios = $apto;
        $juego ->precio = $precio;
        $juego ->consola_id = $consolaId;
        //guardar en la bd
        $juego ->save();
        return $juego;


    }
    // elimiar un juego a partir de su id
    public function remove(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $juego = Juego::findOrFail($id);
        $juego->delete();
        return "ok";

    }
}
