<?php

namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;
use Request;
use DB;

class LoginController extends Controller
{
    public function index(){
      session_start();
      $usuario = Request::input('usuario');
      $password = Request::input('password');

      $usuario = DB::table('usuarios')
      ->where('usuario', $usuario)
      ->where('password', $password)
      ->first();

      $status = array(
        'code'=>200
      );
      $_SESSION['logged']=false;
      if($usuario){
        $_SESSION['logged']=true;
        $_SESSION['id']=$usuario->id;
        return $status;
      }else{
        $status['code']=404;
        return $status;
      }

    }

    public function logout(){
      session_start();
      session_destroy();
      return 'ok';
    }

    public function isLogged(){
      session_start();
      $id = $_SESSION['id'];
      if($_SESSION['logged']){
        $usuario = DB::table('usuarios')
        ->where('id', $id)
        ->get();
        return $usuario;
      }else{
        return 'noLogged';
      }
    }

}
