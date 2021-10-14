<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Kalemler;
use App\Kitaplar;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){

        $datakitap = Kitaplar::Paginate(4);
        $datakalem = Kalemler::Paginate(4);
        return view("front.index", ["datakitap" => $datakitap], ["datakalem" => $datakalem]);
    }
}
