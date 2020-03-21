<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PurchaseOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->text('ordno')->unique();
            $table->date('date');
            $table->integer('bolno')->nullable();
            $table->integer('invoiceno')->nullable();
            $table->text('customer')->nullable();
            $table->text('distributor')->nullable();
            $table->text('soldto');
            $table->text('type');
            
            $table->text('status')->default('open');
            $table->timestamp('added_at')->useCurrent();
            $table->text('added_by');

            $table->integer('units');
            $table->string('productid',8);
           $table->foreign('productid')->references('productid')->on('product_details')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
}


