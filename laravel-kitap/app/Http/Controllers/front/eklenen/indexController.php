<?php

namespace App\Http\Controllers\front\eklenen;

use App\Helper\sepetHelper;
use App\Http\Controllers\Controller;
use App\Kitaplar;
use App\Kalemler;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index(){
        return view("front.eklenen.index");
    }

    public function add($selflink){

        if( $c = Kitaplar::where("selflink", "=", $selflink)->count()){
            if($c!=0){
                $w = Kitaplar::where("selflink", "=", $selflink)->get();
                sepetHelper::add($selflink, $w[0]["fiyat"], asset($w[0]["image"]), asset($w[0]["name"]));

                return redirect()->back()->with("status", "Sepete eklediniz!");

            }else{
                return redirect()->route("index");
            }
        }

        else if ( $c = Kalemler::where("selflink", "=", $selflink)->count()){
            if($c!=0){
                $w = Kalemler::where("selflink", "=", $selflink)->get();
                sepetHelper::add($selflink, $w[0]["fiyat"], asset($w[0]["image"]), asset($w[0]["name"]));

                return redirect()->back()->with("status", "Sepete eklediniz!");

            }else{
                return redirect()->route("index");
            }
        }
    }

    public function remove($selflink){
        sepetHelper::remove($selflink);
        return redirect()->back();
    }

    public function complete(){
        if(sepetHelper::countData()!=0){
            return view("front.eklenen.complete");
        }
        else{
            return redirect("/");
        }
    }

    public function completeStore(Request $request){
        $request->validate(["adres" => "required", "telefon" =>"required"]);
        $adres = $request->input("adres");
        $telefon = $request->input("telefon");
        $mesaj = $request->input("mesaj");
        $json = json_encode(sepetHelper::allList());

        $array = [
            "userid" => Auth::id(),
            "adres" => $adres,
            "telefon" => $telefon,
            "mesaj" => $mesaj,
            "json" => $json
        ];

        $insert = Order::create($array);
        if($insert){
            Session::forget("eklenen");
            return redirect()->back()->with("status", "Siparişiniz alındı.");
        }
        else{
            return redirect()->back()->with("status", "Siparişiniz alınamadı.");
        }
    }

    public function flush(){
        Session::forget("eklenen");
        return redirect("/");
    }
}
