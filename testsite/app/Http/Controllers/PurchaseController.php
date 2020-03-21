<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Http\Request;
use App\PurchaseOrder;
use Illuminate\Support\Facades\Auth;
use PDF;

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

      return redirect('/purchases');
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

        function get_purchase_orders()
        {
          $purchase_orders = PurchaseOrder::get();
          return $purchase_orders;
        }

        function pdf()
        {
          $pdf = \App::make('dompdf.wrapper');
          $pdf-> loadHTML($this->convert_purchase_orders());
          return $pdf->stream();
        }


        function convert_purchase_orders()
        {
          $purchase_orders = $this->get_purchase_orders();
          $output = '
                    <table style="border-collapse:collapse; border:1px;">
                        <tr>
                             <th style="border:1px solid; padding:3px;">
                              Order date
                            </th>
                             <th style="border:1px solid; padding:3px;">
                              PO No. 
                            </th>
                             <th style="border:1px solid; padding:3px;">
                              BOL No. 
                               </th>
                             <th style="border:1px solid; padding:3px;">
                                Invoice No.
                                </th>
                             <th style="border:1px solid; padding:3px;">
                                Customer
                            </th>
                             <th style="border:1px solid; padding:3px;">
                                Distributor
                            </th>
                             <th style="border:1px solid; padding:3px;">
                                Sold to
                                  </th>
                             <th style="border:1px solid; padding:3px;">
                               Status  
                            </th>
                             <th style="border:1px solid; padding:3px;">
                              Type
                            </th>
                            
                        </tr>
                    </thead>';
                    foreach($purchase_orders as $orders)
                    {
                      $output .= '
                <tr text-align-center>
                     <td>' .$orders->date.' </td>
                    <td><b>' .$orders->ordno. '<b></td>
                    <td>' .$orders->bolno. '</td>
                    <td>' .$orders->invoiceno.'</td>
                    <td>' .$orders->customer. '</td>
                    <td>' .$orders->distributor. '</td>
                    <td>' .$orders->soldto. '</td>
                    <td>' .$orders->status. '</td>
                    <td>' .$orders->type. '</td>
                    

                   
                </tr>';
                    }
        $output.= '</table>';
        return $output;


        }

        public static function getPO()
{

  $POno = PurchaseOrder::orderByRaw('ordno DESC')->value('ordno');
  list($alpha,$numeric) = sscanf($POno, "%[A-Z]%d");
  return $alpha . ((int)$numeric+1);
}

        public static function getInvoice()
{

  $invoiceno = PurchaseOrder::orderByRaw('invoiceno DESC')->value('invoiceno');
  return ($invoiceno +1);
}

        public static function getBol()
{

  $bolno = PurchaseOrder::orderByRaw('bolno DESC')->value('bolno');
  return ($bolno+1);
}

      public static function getCustomers()
      {
        return  PurchaseOrder::groupBy('customer')->get()->filter();
       }

       public static function getDistributors()
       {
         return PurchaseOrder::groupBy('distributor')->get()->filter();
     
       }

}

