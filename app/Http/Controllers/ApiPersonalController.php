<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;

class ApiPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $personal=Personal::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $personal=new Personal;

        $personal->nick=$r->get('nick');
        $personal->password=$r->get('password');
        $personal->nombre=$r->get('nombre');
        $personal->apellido_p=$r->get('apellido_p');
        $personal->apellido_m=$r->get('apellido_m');
        $personal->celular=$r->get('celular');
        $personal->correo=$r->get('correo');
        $personal->municipio=$r->get('municipio');
        $personal->fecha_nac=$r->get('fecha_nac');
        $personal->calle=$r->get('calle');
        $personal->numero=$r->get('numero');
        $personal->cruzamiento=$r->get('cruzamiento');
        $personal->id_rol=$r->get('id_rol');

        // capturamos el archivo enviado en la variable foto
        $foto=$r->file('foto');

        $nombre_foto=$r->get('nick');
        
        $personal->foto=$nombre_foto.'.jpg';
        $foto->move(public_path().'/imagenes/usuarios/',$nombre_foto.'.jpg');
        $personal->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $personal=Personal::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $personal=Personal::find($id);

        $personal->nick=$r->get('nick');
        $personal->password=$r->get('password');
        $personal->nombre=$r->get('nombre');
        $personal->apellido_p=$r->get('apellido_p');
        $personal->apellido_m=$r->get('apellido_m');
        $personal->municipio=$r->get('municipio');
        $personal->fecha_nac=$r->get('fecha_nac');
        $personal->celular=$r->get('celular');
        $personal->correo=$r->get('correo');
        $personal->calle=$r->get('calle');
        $personal->numero=$r->get('numero');
        $personal->cruzamiento=$r->get('cruzamiento');
        $personal->id_rol=$r->get('id_rol');

        // capturamos el archivo enviado en la variable foto
        $foto=$r->file('foto');

        $nombre_foto=$r->get('nick');
        $foto->move(public_path().'/imagenes/usuarios/',$nombre_foto.'.jpg');
        $personal->foto=$nombre_foto.'.jpg';

        $personal->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $personal=Personal::destroy($id);
    }
}
