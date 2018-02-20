<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
class ProductController extends Controller
{
    public function index(){
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products')); //Listado
    }

    public function create(){

    	return view('admin.products.create'); //Formulario
    }

    public function store(Request $request){
    	//dd($request->all());

    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');

    	$product->save();

    	return redirect('/admin/products');

    }

     public function edit($id){

     	$product = Product::find($id);
    	return view('admin.products.edit')->with(compact('product')); //Formulario
    }

    public function update(Request $request, $id){
    	//dd($request->all());

    	$product =Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');

    	$product->save();

    	return redirect('/admin/products');
    }


    public function destroy($id){
    	//dd($request->all());
    	ProductImage::where('product_id', $id)->delete();
    	
    	$product =Product::find($id);
    	$product->delete();

    	return back();
    }
}