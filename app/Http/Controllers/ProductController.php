<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function cadastro(){
        return view('registerprod');
    }

    public function store(Request $request){

        $prod = new Product();
        $prod->name = $request->name;
        $prod->weigth = $request->weigth;
        $prod->bar_code = $request->bar_code;
        $prod->value = $request->value;

        $prod->save();

        return redirect()->route('dashboard');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;

        Product::whereIn('id_prod',$ids)->delete();
        return redirect()->back();
    }

    public function mudarStatus($id){
        dd($id);
    }
}
