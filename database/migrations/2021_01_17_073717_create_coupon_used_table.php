<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponUsedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_used', function (Blueprint $table) {
            //
	   $table->bigIncrements('id');
            $table->string('coupon');
            $table->string('status')->default('Valid');
            $table->string('user_id')->nullable();
            $table->timestamps();
	    $table->index(['coupon','status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_used');
    }
}
