<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnExtraToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table -> string('user_email',100);
            $table->string('name',100) -> nullable();
            $table->string('address',150) -> nullable();
            $table->string('city',50) -> nullable();
            $table->string('state',50) -> nullable();
            $table->string('mobile',50);
            $table->string('postal_code')->nullable();
            $table -> float('shipping_charges') -> nullable();
            $table -> string('coupon_code',150) -> nullable();
            $table -> float('coupon_amount') -> nullable();
            $table -> string('payment_method',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
