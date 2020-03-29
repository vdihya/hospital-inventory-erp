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

    public static function getProducts()
    {
        return Product::sortable()->paginate();
    }

    public static function getStock(Request $request)
    {
        return Product::where('productid',$request->productid)->value('active_stock');
        
    }

    public static function getProduct(Request $request)
    {
        return Product::where('productid',$request->productid)->first();
        
    }

    public static function updateStock(Request $request)
    {
       Product::where('productid',$request->productid)->increment('active_stock',$request->units);

        return redirect('/viewProducts');
        
    }

    public static function deleteProduct(Request $request)
    {
        Product::where('productid',$request->productid)->delete();

        return redirect('/viewProducts');

    }
    public static function checkStock(Request $request)
    {
      if($request->units > $request->allowed) return 1;
      else return 0;
        

    }
 
    
}
