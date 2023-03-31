<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use GuzzleHttp\Psr7\Query;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\ManagesFrequencies;



class ProductController extends Controller
{

    public function cadastro(){
        return view('registerprod');
    }

    public function store(Request $request){
        $weigth = str_replace(',','.',$request->weigth);
        $value = str_replace(',','.',$request->value);

        $prod = new Product();
        $prod->name = $request->name;
        $prod->weigth = $weigth;
        $prod->bar_code = $request->bar_code;
        $prod->value = $value;

        $prod->save();

        return redirect()->route('dashboard');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;

        Product::whereIn('id_prod',$ids)->delete();
        return redirect()->back();
    }

    public function mudarStatus($id){
        $status = DB::table('products')->where('id_prod',$id)->value('status');
        if ($status) {
            $data = [
                'status' => 0
            ];
        } else {
            $data = [
                'status' => 1
            ];
        }

        Product::where('id_prod',$id)->update($data);
        return redirect()->route('dashboard');
    }

    public function edit($id){
        $products = Product::where('id_prod',$id)->first();
        if (!empty($products)) {
            return view('editprod',['products' => $products]);
        }else{
            return redirect()->route('dashboard');
        }
    }

    public function update(Request $request, $id){
        $weigth = str_replace(',','.',$request->weigth); 
        $value = str_replace(',','.',$request->value);
        $data = [
            'name' => $request->name,
            'weigth' => $weigth,
            'bar_code' => $request->bar_code,
            'value' => $value
        ];

        Product::where('id_prod',$id)->update($data);
        return redirect()->route('dashboard');
    }
}
