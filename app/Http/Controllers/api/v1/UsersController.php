<?php

namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;
use Request;
use DB;

class UsersController extends Controller
{
    public function Users(){
      $users = DB::table('usuarios')
      ->where('id_role', '=', 2)
      ->get();
      return $users;
    }

    public function insert(){
      $usuario = Request::input('usuario','');
      $nombre = Request::input('nombre','');
      $ap_paterno = Request::input('ap_paterno','');
      $ap_materno = Request::input('ap_materno','');
      $edad = Request::input('edad','');
      $pass = Request::input('pass','');
      $pass_r = Request::input('pass_r','');

      if ($pass = $pass_r) {
        $result=DB::table('usuarios')->insert(
          array('usuario' => $usuario, 'nombre' => $nombre, 'ap_paterno' => $ap_paterno,'ap_materno' => $ap_materno,'edad' => $edad, 'password' => $pass, 'id_role'=>2)
        );

        if(count($result) == 1){
                       $res=array(
                       'code' => 200,
                       'msg' => 'ok'
                       );

               }else{
                       $res=array(
                       'code' => 300,
                       'msg' => 'bad'
                       );
               }

      } else {
        $res=array(
        'code' => 300,
        'msg' => 'dif'
        );
      }

    return $res;
    }

    public function calif(){
      $id_user = Request::input('id_user','');
      $res = DB::table('usuarios_imagenes')->select('id_test','respuesta')
      ->where('id_usuario', '=', $id_user)
      ->where('status', '=', 2)
      ->get();

  		if(count($res) > 1){
  			foreach($res as $k => $v){
          $res_t = DB::table('usuarios_categorias')->select('id_categoria')->where('id', '=', $v->id_test)->get();
  		    $res_c = DB::table('categorias')->select('nombre')->where('id', '=', $res_t[0]->id_categoria)->get();
          $v->id_test = $res_c;
  			}
      }

      $r = array(
        'result' => $res,
        'count' => count($res)
      );

      return $r;

    }

    public function edit(){
      $id_user = Request::input('id_user','');
      $users = DB::table('usuarios')
      ->where('id_role', '=', 2)
      ->where('id', '=', $id_user)
      ->get();
      if(count($users) == 1){
        return $users;
      }else{
        return 'bad';
      }
    }

    public function user_test(){
      $id_user = Request::input('id_user','');
      $res = DB::table('usuarios_categorias')
      ->where('id_usuario', '=', $id_user)
      ->where('status', '=', 1)
      ->get();
      if(count($res) > 0){
        foreach($res as $k => $v){
          $res_c = DB::table('categorias')->select('nombre')->where('id', '=', $res[$k]->id_categoria)->get();
          $res[$k]->id_categoria = $res_c;
        }
        return $res;
      }else{
        return 'bad';
      }
    }
}
