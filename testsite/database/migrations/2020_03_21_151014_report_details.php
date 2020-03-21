<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReportDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('report_details', function (Blueprint $table) {
            $table->increments('reportno')->unique();
            $table->text('chart_title');
            $table->text('model');
            $table->text('report_type');
            $table->text('chart_type');
            $table->text('group_by_field');
            $table->text('aggregate_function');
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
        
        Schema::dropIfExists('report_details');
    }
}
