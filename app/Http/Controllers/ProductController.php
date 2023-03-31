<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Product;

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
    }
}
