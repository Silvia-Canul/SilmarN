<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Capilla;

class ApiCapillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $capilla=Capilla::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $capilla=new Capilla;

        $capilla->capilla=$request->get('capilla');
        $capilla->descripcion=$request->get('descripcion');
        $capilla->municipio=$request->get('municipio');
        $capilla->calle=$request->get('calle');
        $capilla->numero=$request->get('numero');
        $capilla->cruzamiento=$request->get('cruzamiento');

        $capilla->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $capilla=Capilla::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $capilla=Capilla::find($id);

        $capilla->capilla=$request->get('capilla');
        $capilla->descripcion=$request->get('descripcion');
        $capilla->municipio=$request->get('municipio');
        $capilla->calle=$request->get('calle');
        $capilla->numero=$request->get('numero');
        $capilla->cruzamiento=$request->get('cruzamiento');

        $capilla->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $capilla=Capilla::destroy($id);
    }
}
