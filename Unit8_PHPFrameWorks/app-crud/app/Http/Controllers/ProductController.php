<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index', ['products'=>$products]);
        
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'qty'=>'required|numeric',
            'description'=>'nullable',
            'price'=>'required|decimal:0,2',
        ]);

        $newProduct = Product::create($data);

        return redirect(route('products.index'));
    }

    public function edit(Product $product){
        if(request()->isMethod('get')){
            return view('products.edit', ['product'=>$product]);
        }
        
        $data = request()->validate([
            'name'=>'required|string|max:255',
            'qty'=>'required|numeric',
            'description'=>'nullable',
            'price'=>'required|decimal:0,2',
        ]);

        $product->update($data);

        return redirect(route('products.index'));
    }

    public function delete(Product $product){
        $product->delete();
        return redirect(route('products.index'));
    }
}
