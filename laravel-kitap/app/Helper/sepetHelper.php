<?php
namespace App\Helper;


use Illuminate\Support\Facades\Session;

class sepetHelper
{
    static function add($selflink, $fiyat, $image, $name){
        $sepet = Session::get("eklenen");

        $array = [
            "selflink" => $selflink,
            "image" => $image,
            "name" => $name,
            "fiyat" => $fiyat
        ];
        Session::put("eklenen.". rand(1,90000),$array);
    }

    static function allList(){
        $x = Session::get("eklenen");
        if (!$x){
            $x = [];
        }
        return $x;
    }

    static function remove($selflink){
            $s = Session::get("eklenen");
            Session::forget("eklenen." .$selflink);
        }

    static function countData(){
        return (is_array(Session::get('eklenen'))) ? count(Session::get('eklenen')) : 0;
    }

    static function totalPrice(){
           $data = self::allList();
           return collect($data)->sum("fiyat");
        }

}
