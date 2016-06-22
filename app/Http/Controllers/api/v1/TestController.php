<?php

namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;
use Request;
use DB;

class TestController extends Controller
{
    public function tresErrores(){
      $id = Request::input('id_test');
      DB::table('usuarios_categorias')
      ->where('id', '=', $id)
      ->update(['respuesta'=>3]);
      return 'ok';
    }
}
