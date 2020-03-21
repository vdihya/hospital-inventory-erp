<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class PurchaseOrder extends Model
{
	public function PurchaseOrder()
  {
    return $this->hasMany(PurchaseOrder::class);
  }
	use Sortable;
	public $timestamps = false;
     protected $table = 'purchase_orders';
    protected $fillable = ['customer'];
     public $sortable = ['date', 'ordno', 'bolno', 'invoiceno', 'customer','distributor','soldto','status','type','added_by'];

}
