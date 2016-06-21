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
      $name = Request::input('nombre');
      $arr = [];
      $name_img = [];

      $id_categoria = DB::table('categorias')
      ->where('nombre', '=', $name)
      ->get();


      $id_imagen = DB::table('imagenes_categorias')->select('id')
      ->where('id_categoria', '=', $id_categoria[0]->id)
      ->get();

      $count = DB::table('imagenes_categorias')
      ->where('id_categoria', '=', $id_categoria[0]->id)
      ->count();

      for ($i=0; $i < $count ; $i++) {
        array_push($arr, $id_imagen[$i]->id);
      }

      for ($i=0; $i < $count ; $i++) {
        $n = DB::table('imagenes')
        ->where('id', '=', $arr[$i])
        ->get();
        array_push($name_img, $n[0]);
      }
      $r = array(
                'code' => 200,
                'msg' => 'ok',
                'row' => $name_img,
                'count' => $count
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
