<?php

namespace App\Http\Controllers\front\search;

use App\Http\Controllers\Controller;
use App\Kalemler;
use App\Kitaplar;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        if(strip_tags($_GET["q"]!="")){
            $q = strip_tags($_GET["q"]);

            if(Kitaplar::all()!="" OR Kalemler::all()!=""){
                $datakitap = Kitaplar::where("name","like", "%".$q."%")->paginate(10);
                $datakalem = Kalemler::where("name","like", "%".$q."%")->paginate(10);
                return view("front.search.index", ["datakitap"=>$datakitap],  ["datakalem"=>$datakalem]);
            }

        }
        else{
            return redirect("/");
        }

    }
}
