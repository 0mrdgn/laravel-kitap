<?php

namespace App\Http\Controllers\admin\marka;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Markalar;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {

        $data = Markalar::paginate(10);
        return view("admin.marka.index", ["data" => $data]);
    }

    public function create()
    {
        return view("admin.marka.create");
    }

    public function store(Request $request)
    {
        $all = $request->except("_token");
        $all["selflink"] = mHelper::permalink($all["name"]);

        $insert = Markalar::create($all);

        if ($insert) {
            return redirect()->back()->with("status", "Marka başarı ile eklendi.");
        } else {
            return redirect()->back()->with("status", "Marka eklenemedi.");

        }
    }

    public function edit($id)
    {
        $c = Markalar::where("id", "=", $id)->count();
        if ($c != 0) {
            $data = Markalar::where("id", "=", $id)->get();
            return view("admin.marka.edit", ["data" => $data]);
        } else {
            return redirect("/");
        }
    }

    public function update(Request $request)
    {
        $id = $request->route("id");
        $c = Markalar::where("id", "=", $id)->count();

        if ($c != 0) {
            $all = $request->except("_token");
            $all["selflink"] = mHelper::permalink($all["name"]);
            $update = Markalar::where("id", "=", "$id")->update($all);
            if ($update) {
                return redirect()->back()->with("status", "Marka Düzenlendi.");
            } else {
                return redirect()->back()->with("status", "Marka Düzenlenemedi.");
            }
        } else {
            return redirect("/");
        }
    }

    public function delete($id)
    {
        $c = Markalar::where("id", "=", $id)->count();

        if ($c != 0) {
            $delete = Markalar::where("id", "=", $id)->delete();
            return redirect()->back();
        } else {
            return redirect("/");
        }
    }
}
