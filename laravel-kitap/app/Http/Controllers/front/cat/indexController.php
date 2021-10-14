<?php

namespace App\Http\Controllers\front\cat;

use App\Http\Controllers\Controller;
use App\Kalemler;
use App\Kategoriler;
use App\Kitaplar;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index($selflink){
        $c = Kategoriler::where("selflink", "=", $selflink)->count();

        if($c != 0){
            $w = Kategoriler::where("selflink", "=", $selflink)->get();
            $datakitap = Kitaplar::where("kategoriid", "=", $w[0]["id"])->paginate(4);
            return view("front.cat.index", ["info"=>$w, "datakitap"=>$datakitap]);
        }
        else{
            return redirect("/");
        }
    }

}
