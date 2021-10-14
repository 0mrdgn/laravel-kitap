<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kalemler extends Model
{
    protected $guarded = [];

    static function getField($id,$field){
        $c = Kalemler::where("id", "=", "$id")->count();
        if($c!=0){
            $w = Kalemler::where("id", "=", "$id")->get();
            return $w[0][$field];
        }else{
            return "Silinmiş kalemler!";
        }
    }

}
