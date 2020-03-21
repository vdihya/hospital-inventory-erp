<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Product extends Model
{
	use Sortable;
	public $timestamps = false;
     protected $table = 'product_details';
     public $sortable = ['productid','product_name','date_of_stocking','active_stock'];

}
