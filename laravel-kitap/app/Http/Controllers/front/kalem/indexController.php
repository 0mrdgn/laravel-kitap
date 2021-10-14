<?php

namespace App\Http\Controllers\front\kalem;

use App\Http\Controllers\Controller;
use App\Models\Kalemler;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index($selflink)
    {
        $c = Kalemler::where("selflink", "=", "$selflink")->count();
        if ($c != 0) {
            $w = Kalemler::where("selflink", "=", "$selflink")->get();
            return view("front.kalem.index", ["data" => $w]);
        } else {
            return redirect("/");
        }
    }
}
