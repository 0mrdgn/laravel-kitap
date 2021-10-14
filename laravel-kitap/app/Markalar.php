<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Markalar extends Model
{
    static function getField($id,$field){
        $c = Markalar::where("id", "=", "$id")->count();
        if($c!=0){
            $w = Markalar::where("id", "=", "$id")->get();
            return $w[0][$field];
        }else{
            return "Silinmiş markalar!";
        }
    }
}
