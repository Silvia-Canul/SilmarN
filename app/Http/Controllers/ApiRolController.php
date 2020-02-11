<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;

class ApiRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $rol=Rol::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $re)
    {
        $rol=new Rol;

        $rol->nom_rol=$re->get('nom_rol');
        $rol->permisos=$re->get('permisos');
        $rol->eliminado=$re->get('eliminado');

        $rol->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $rol=Rol::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $re, $id)
    {
        $rol=Rol::find($id);

        $rol->nom_rol=$re->get('nom_rol');
        $rol->permisos=$re->get('permisos');
        $rol->eliminado=$re->get('eliminado');

        $rol->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $rol=Rol::destroy($id);
    }
}
