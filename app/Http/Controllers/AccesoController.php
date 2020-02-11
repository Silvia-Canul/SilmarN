<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use Illuminate\Support\Facades\Redirect;

use Session;
use Cache;

class AccesoController extends Controller
{
    //
    public function validar(Request $request)
   	{
   		$nick =$request->get('nick');
      $password = $request->get('password');

   		$ingresar = Personal::where('nick','=',$nick)
    	->where('password','=',$password)
    	->first();
    	{
    		  $nivel=$ingresar->rol->nom_rol;
          $created_at=$ingresar->rol->created_at;
        	$nombre = $ingresar->nombre;
        	$foto = $ingresar->foto;

        	Session::put('nombre',$nombre);
        	Session::put('nivel',$nivel);
        	Session::put('foto',$foto);


  if ($nivel == 'Parroco') {
          return redirect('capilla');
        }else
        {
          return redirect('personal');
        }

      }
      {
        return redirect('/');
      }
  }
    public function salir()
    {
        Session::flush();
        Session::reflash();
        Cache::flush();
        // Cookie::forget('laravel_session');
        unset($_COOKIE);
        unset($_SESSION);
        return Redirect::to('/');
   }
}
