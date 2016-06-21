<?php

namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;
use Request;
use DB;

class ImagesController extends Controller
{
    public function index(){
      $images=DB::table('imagenes')
      ->get();
      $length = count($images);
      $random = rand(1, $length);
      $image=DB::table('imagenes')
      ->where('id', '=', $random)
      ->get();
      return $image;
    }
    public function get_images(){
      $images=DB::table('imagenes')
      ->get();
      return $images;
    }

    public function getImagesInCategory(){
      $id = Request::input('id');

      $imagenes=DB::table('imagenes')
      ->join('imagenes_categorias', 'imagenes.id', '=', 'imagenes_categorias.id_imagen')
      ->select('imagenes.id', 'imagenes.foto')
      ->where('imagenes_categorias.id_categoria', '=', $id)
      ->get();

      $r = array(
                'code' => 200,
                'msg' => 'ok',
                'row' => $imagenes
      );
      return $r;
    }

    public function isNot(){
      $id_image = Request::input('id_image');
      $name_category = Request::input('name');

      $id_category = DB::table('categorias')->select('id')
      ->where('nombre', '=', $name_category)
      ->get();

      $count = DB::table('imagenes_categorias')
      ->count();

      for ($i=0; $i < $count; $i++) {
        $res = DB::table('imagenes_categorias')
        ->where('id_categoria', '=', $id_category[0]->id)
        ->where('id_imagen', '=', $id_image)
        ->get();
      }
      if(count($res) == 1){
          $result = 1;
      }else{
          $result = 0;
      }
      return $result;
    }
}
