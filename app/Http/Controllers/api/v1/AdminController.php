<?php

namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;
use Request;
use DB;

class AdminController extends Controller
{
    public function index(){
      return '';
    }
    public function Admins(){
        $admins = DB::table('usuarios')
        ->where('id_role', '=', 1)
        ->get();
        return $admins;
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
          array('usuario' => $usuario, 'nombre' => $nombre, 'ap_paterno' => $ap_paterno,'ap_materno' => $ap_materno,'edad' => $edad, 'password' => $pass, 'id_role'=>1, 'status'=>1)
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

}
