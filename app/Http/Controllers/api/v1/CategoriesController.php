<?php

namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;
use Request;
use DB;

class CategoriesController extends Controller
{
    public function categories(){
          $categories = DB::table('categorias')
          ->where('status', '=', 1)
          ->get();
          return $categories;
    }

    public function new_category(){
      $name = Request::input('name','');
      $result=DB::table('categorias')->insert(
  			array('nombre' => $name, 'status'=>1)
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
    return $res;
  }

  public function usersCategories(){
    session_start();
    $MY_ID = $_SESSION['id'];
    $arr = [];
    $id_test = [];
    $r = [];
    $res = DB::table('usuarios_categorias')
    ->where('id_usuario', '=', $_SESSION['id'])
    ->where('status', '=', 1)
    ->get();

		if(count($res) > 1){
			foreach($res as $k => $v){
				$res_c = DB::table('categorias')->where('id', '=', $res[$k]->id_categoria)->get();
				$res[$k]->id_categoria = $res_c;
			}
    }
    return $res;
  }

  public function mod_status(){
    session_start();
    $name = Request::input('name','');

    $id_category = DB::table('categorias')->select('id')
    ->where('nombre', '=', $name)
    ->get();

    $res = DB::table('usuarios_categorias')
    ->where('id_usuario', '=', $_SESSION['id'])
    ->where('id_categoria','=',$id_category[0]->id)
    ->update(['status' => 2]);

    if(count($res) == 1){
      return 'ok';
    } else {
      return 'bad';
    }
  }

  public function answer(){
    session_start();

    $name = Request::input('name','');
    $id_imagen = Request::input('id_imagen','');
    $respuesta = Request::input('respuesta','');

    $id_category = DB::table('categorias')->select('id')
    ->where('nombre', '=', $name)
    ->get();

    $id_test = DB::table('usuarios_categorias')->select('id')
    ->where('id_usuario', '=', $_SESSION['id'])
    ->where('id_categoria','=', $id_category[0]->id)
    ->get();

    $res=DB::table('usuarios_imagenes')->insert(
      array('id_test' => $id_test[0]->id, 'id_usuario'=>$_SESSION['id'], 'id_imagen'=>$id_imagen, 'respuesta'=>$respuesta, 'status'=>2)
    );

    if(count($res) == 1){
      return 'ok';
    } else {
      return 'bad';
    }
  }


  public function new_test(){
    $id_user = Request::input('id_user','');
    $category = Request::input('category','');

    $id_category = DB::table('categorias')->select('id')
    ->where('nombre', '=', $category)
    ->get();


    if(count($id_category) == 1){
      $result=DB::table('usuarios_categorias')->insert(
        array('id_usuario' => $id_user, 'id_categoria'=>$id_category[0]->id, 'status'=>1)
      );
    } else {
      return 'bad';
    }

    return 'ok';
  }


}
