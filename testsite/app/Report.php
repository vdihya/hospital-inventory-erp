<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Report extends Model
{
   
	use Sortable;
	public $timestamps = false;
     protected $table = 'report_details';
     public $sortable = ['reportno', 'chart_title', 'chart_type', 'report_type', 'group_by_field','model'];
}
