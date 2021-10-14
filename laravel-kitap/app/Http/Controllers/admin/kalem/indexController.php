<?php

namespace App\Http\Controllers\admin\kalem;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Markalar;
use App\Models\Kalemler;
use Illuminate\Http\Request;
use File;

class indexController extends Controller
{
    public function index()
    {
        $data = Kalemler::paginate(10);
        return view("admin.kalem.index", ["data" => $data]);
    }

    public function create()
    {
        $marka = Markalar::all();
        return view("admin.kalem.create", ["marka" => $marka]);
    }

    public function store(Request $request)
    {
        $all = $request->except("_token");
        $all["selflink"] = mHelper::permalink($all["name"]);
        $all["image"] = imageUpload::singleUpload(rand(1, 1900), "kalem", $request->file("image"));

        $insert = Kalemler::create($all);
        if ($insert) {
            return redirect()->back()->with("status", "Kalem eklendi.");
        } else {
            return redirect()->back()->with("status", "Kalem eklenemedi.");
        }
    }

    public function edit($id)
    {
        $c = Kalemler::where("id", "=", "$id")->count();
        if ($c != 0) {
            $data = Kalemler::where("id", "=", "$id")->get();
            $marka = Markalar::all();

            return view("admin.kalem.edit", ["data" => $data, "marka" => $marka]);
        } else {
            return redirect("/");
        }
    }

    public function update(Request $request)
    {

        $id = $request->route("id");

        $c = Kalemler::where("id", "=", "$id")->count();
        if ($c != 0) {
            $data = Kalemler::where("id", "=", "$id")->get();
            $all = $request->except("_token");
            $all["selflink"] = mHelper::permalink($all["name"]);
            $all["image"] = imageUpload::singleUploadUpdate(rand(1, 9000), "kalem", $request->file("image"), $data, "image");

            $update = Kalemler::where("id", "=", "$id")->update($all);
            if ($update) {
                return redirect()->back()->with("status", "Kalem başarılı bir şekilde güncellendi.");
            } else {
                return redirect()->back()->with("status", "Kalem güncellenemedi.");
            }
        } else {
            return redirect("/");
        }
    }

    public function delete($id)
    {

        $c = Kalemler::where("id", "=", "$id")->count();
        if ($c != 0) {
            $data = Kalemler::where("id", "=", "$id")->get();
            File::delete("public/" . $data[0]["image"]);
            Kalemler::where("id", "=", "$id")->delete();
            return redirect()->back();
        } else {
            return redirect("/");
        }
    }
}
