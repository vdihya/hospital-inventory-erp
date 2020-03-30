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

    public function PROreportform()
    {
        $products = Product::sortable()->paginate();
        return view('PROreportform',compact('products'));
    }
    
    public function PROpdf(Request $request)
        {
          $pdf = \App::make('dompdf.wrapper');
          $pdf-> loadHTML(ProductController::convert_products($request));
          return $pdf->stream();
        }

        public function convert_products(Request $request)
        {
          $products = ProductController::Productsearch($request);
          $output = '
                    <table style="border-collapse:collapse; border:1px;">
                        <tr>
                             <th style="border:1px solid; padding:3px;">
                              Product ID
                            </th>
                             <th style="border:1px solid; padding:3px;">
                              Product Name
                            </th>
                             <th style="border:1px solid; padding:3px;">
                              Current Stock 
                               </th>
                             <th style="border:1px solid; padding:3px;">
                                Date of Stocking
                                </th>
                             <th style="border:1px solid; padding:3px;">
                                Total Purchased Units
                            </th>
                            
                        </tr>
                    </thead>';
                    foreach($products as $product)
                    {
                      $output .= '
                <tr text-align-center>
                     <td>' .$product->productid.' </td>
                    <td><b>' .$product->product_name. '<b></td>
                    <td>' .$product->active_stock. '</td>
                    <td>' .$product->date_of_stocking.'</td>
                    <td>' .$product->all_time_purchase_value. '</td>
                    

                   
                </tr>';
                    }
        $output.= '</table>';
        return $output;


        }
        public function Productsearch(Request $request)
        {
            $s = $request->search;

            $startdate = $request->startdate;
            $enddate = $request->enddate;

            $activestart = $request->activestart;
            $activeend = $request->activeend;
            

            $alltimestart = $request->alltimestart;
            $alltimeend = $request->alltimeend;



            if($s!=null)
                {
                    $orders = Product::where('productid','LIKE','%'.$s.'%')->orWhere('date_of_stocking','LIKE','%'.$s.'%')->orWhere('active_stock','LIKE','%'.$s.'%')->orWhere('all_time_purchase_value','LIKE','%'.$s.'%')->orWhere('product_name','LIKE','%'.$s.'%')->sortable()->get();
         
                }

            if($enddate!=null || $startdate!=null)
                {

                    $orders = Product::where('date_of_stocking','>=',date($startdate))->orWhere('date_of_stocking','<=',date($enddate))->sortable()->get();
                }

            if($activestart!=null)                {
                    $orders = Product::where('active_stock','>=',($activestart))->get();
             
                }
            
            if($activeend!=null)                {
                    $orders = Product::where('active_stock','<=',($activeend))->get();
             
                }

            if($alltimestart!=null)                {
                    $orders = Product::where('all_time_purchase_value','>=',($alltimestart))->get();
             
                }
            
            if($alltimeend!=null)                {
                    $orders = Product::where('all_time_purchase_value','<=',($alltimeend))->get();
             
                }
            return $orders;


        }
    
}
