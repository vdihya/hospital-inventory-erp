<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {

            $table->string('productid',8)->unique();
            $table->primary('productid');
             $table->text('product_name');
            
            $table->date('date_of_stocking');
            $table->integer('active_stock')->nullable();
            
            $table->timestamp('added_at')->useCurrent();
            
            $table->bigInteger('all_time_purchase_value')->default(0);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('product_details');   //
    }
}
