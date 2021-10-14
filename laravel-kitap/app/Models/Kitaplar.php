<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitaplar extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function getField($id,$field){
        $c = Kitaplar::where("id", "=", "$id")->count();
        if($c!=0){
            $w = Kitaplar::where("id", "=", "$id")->get();
            return $w[0][$field];
        }else{
            return "Silinmiş kitaplar!";
        }
    }

}
