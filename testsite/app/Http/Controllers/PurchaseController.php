<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\PurchaseOrder;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{

  public function __construct()
    {

        $this->middleware(['auth','verified']);
        
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

    }
    public function show()
    {

        return view('purchaseform');
    }
    public function store()
    {
        $order = new PurchaseOrder;
        
        $order->ordno = request('ordno');
        $order->date = request('date');
        $order->bolno = request('bolno');
        $order->invoiceno = request('invoiceno');
        $order->customer = request('customer');
        $order->distributor = request('distributor');
        $order->soldto = request('soldto');
        $order->type = request('type');
        $order->added_by=Auth::user()->name;
        $order->save();

      return redirect('/home');
    }
    public function view()
    {
       $orders = PurchaseOrder::sortable()->paginate();
        //$search =  PurchaseOrder::sortable()->paginate();
       $customers = PurchaseOrder::groupBy('customer')->get();
       $distributors = PurchaseOrder::groupBy('distributor')->get();
        return view('purchasedetails',compact('orders','customers','distributors'));
     
    }

    public function search(Request $request)
    {

        $c = $request->customers;
         $d= $request->distributors;
        $s = $request->search;
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $status = $request->status;
            if($c!==null)
                {
                    $q = $request->input('customers');
                  $orders = PurchaseOrder::where('customer','LIKE',$q)->sortable()->get();
             
                }
                if($d!=null)
                {
                    $q = $request->input('distributors');
                   $orders = PurchaseOrder::where('distributor','LIKE',$q)->sortable()->get();
         
                }

            if($s!=null)
                {
                   $orders = PurchaseOrder::where('ordno','LIKE','%'.$s.'%')->orWhere('date','LIKE','%'.$s.'%')->orWhere('customer','LIKE','%'.$s.'%')->orWhere('bolno','LIKE','%'.$s.'%')->orWhere('invoiceno','LIKE','%'.$s.'%')->orWhere('distributor','LIKE','%'.$s.'%')->orWhere('soldto','LIKE','%'.$s.'%')->orWhere('status','LIKE','%'.$s.'%')->orWhere('type','LIKE','%'.$s.'%')->orWhere('added_by','LIKE','%'.$s.'%')->sortable()->get();
         
                }
            if($enddate!=null || $startdate!=null)
            {

                $orders = PurchaseOrder::whereBetween('date', [$startdate, $enddate])->sortable()->get();
            }
            if($status!=null)
            {

                $orders = PurchaseOrder::where('status','LIKE',$status)->sortable()->get();
            }

             


             $customers = PurchaseOrder::groupBy('customer')->get();
               $distributors = PurchaseOrder::groupBy('distributor')->get();
            return view ('purchasedetails',compact(
                'customers','orders','distributors'));
     }
       

    public function closeOrder(Request $request)
        {

                
                PurchaseOrder::where('ordno',$request->ordno)->update(array('status' => 'closed'));

      return redirect('/purchases');
        }

}
