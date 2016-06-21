<?php

namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;
use Request;
use DB;

class RegisterController extends Controller
{
    public function index(){
      $usuario = Request::input('usuario');
      $nombre = Request::input('nombre');
      $ap_paterno = Request::input('ap_paterno');
      $ap_materno = Request::input('ap_materno');
      $edad = Request::input('edad');
      $password = Request::input('password');

      if($usuario!=''&&$nombre!=''&&$ap_paterno!=''&&$ap_materno!=''&&$edad!=''&&$password!=''){
         DB::table('usuarios')
         ->insertGetId([
           'usuario'=>$usuario,
           'nombre'=>$nombre,
           'ap_paterno'=>$ap_paterno,
           'ap_materno'=>$ap_materno,
           'edad'=>$edad,
           'password'=>$password,
           'id_role'=>2
         ]);
         return 'ok';
       }else{
         return 500;
       }
    }
}
