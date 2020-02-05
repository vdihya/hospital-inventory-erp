<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class PurchaseOrder extends Model
{
	use Sortable;
	public $timestamps = false;
     protected $table = 'purchase_orders';
    protected $fillable = ['customer'];
     public $sortable = ['date', 'ordno', 'bolno', 'invoiceno', 'customer','distributor','soldto','status','type','added_by'];

}
