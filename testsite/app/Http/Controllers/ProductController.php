<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function addProduct()
    {
    	return view('productform');
    }

    public function store()
    {
    	$product = new Product;

        $product->productid = request('productid');
        $product->product_name= request('product_name');
        $product->date_of_stocking = request('date_of_stocking');
        $product->active_stock= request('active_stock');
        $product->save();

        return redirect('/viewProducts');


    }
    public function viewProducts()
    {
    	$products = Product::sortable()->paginate();
       

    	return view('products',compact('products'));
    }
     public static function getProductID()
    {
        $array = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        return $array[rand(0,25)] . $array[rand(0,25)] . $array[rand(0,25)] . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9);

    }
}
