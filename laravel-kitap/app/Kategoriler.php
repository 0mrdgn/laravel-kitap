<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{

    protected $guarded =[];

    static function getField($id,$field){
        $c = Kategoriler::where("id", "=", "$id")->count();
        if($c!=0){
            $w = Kategoriler::where("id", "=", "$id")->get();
            return $w[0][$field];
        }else{
            return "Silinmiş kategoriler!";
        }
    }
    public function totalProducts(){

        return Kitaplar::where("kategoriid", $this->id)->count();
    }

    public function parentCategories()
    {
        return $this->hasOne(Kategoriler::class, "parentId","kategoriid");
    }

    public function childrenCategories()
    {
        return $this->hasMany(Kategoriler::class, "parentID", "id");
    }

    public static function getRootCategory() {
       return Kategoriler::whereNull('parentID')->get();
    }

}
