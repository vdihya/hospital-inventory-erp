<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->text('ordno');
            $table->date('date');
            $table->integer('bolno');
            $table->integer('invoiceno');
            $table->text('customer');
            $table->text('distributor');
            $table->text('soldto');
             $table->text('type');
            
            $table->text('status')->default('open');
            $table->timestamp('added_at')->useCurrent();
       
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
