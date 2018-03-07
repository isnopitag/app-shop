<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    	$messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.required' => 'La descripción corta es un campo obligatorio.',
            'description.max' => 'La descripción corta solo admite hasta 200 caracteres.',
            'price.required' => 'Es obligatorio definir un precio para el producto.',
            'price.numeric' => 'Ingrese un precio válido.',
            'price.min' => 'No se admiten valores negativos.'
        ];
    	//Validar
    	$rules =[
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0',
    	];

    	$this->validate($request,$rules, $messages);
    	//Registrar el producto
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


     	$messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.required' => 'La descripción corta es un campo obligatorio.',
            'description.max' => 'La descripción corta solo admite hasta 200 caracteres.',
            'price.required' => 'Es obligatorio definir un precio para el producto.',
            'price.numeric' => 'Ingrese un precio válido.',
            'price.min' => 'No se admiten valores negativos.'
        ];
    	//Validar
    	$rules =[
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0',
    	];

    	$this->validate($request,$rules, $messages);

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
