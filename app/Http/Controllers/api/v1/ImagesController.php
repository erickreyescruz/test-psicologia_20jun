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
      $image[0]->random=$random;
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

      $status = DB::table('imagenes')
      ->join('imagenes_categorias', 'imagenes.id', '=', 'imagenes_categorias.id_imagen')
      ->join('categorias', 'categorias.id', '=', 'imagenes_categorias.id_categoria')
      ->select('categorias.nombre')
      ->where('imagenes.id', '=', $id_image)
      ->get();
      return $status;
    }
}
