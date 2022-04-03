<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
          $table->id();
          $table->bigInteger('order_code')->unique();
          $table->bigInteger('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->bigInteger('coupon_id')->unsigned();
          $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');
          $table->decimal('subtotal')->nullable();
          $table->decimal('discount')->nullable();
          $table->decimal('payment')->nullable();
          $table->decimal('change')->nullable();
          $table->decimal('tax')->nullable();
          $table->decimal('total')->nullable();
          $table->string('firstname')->nullable();
          $table->string('lastname')->nullable();
          $table->string('mobile')->nullable();
          $table->string('email')->nullable();
          $table->string('line1')->nullable();
          $table->string('city')->nullable();
          $table->string('province')->nullable();
          $table->string('zipcode')->nullable();
          $table->enum('order_type',['online', 'offline']);
          $table->tinyInteger('status')->comment('0 - ordered, 1 - delivering, 2 - delivered, 3 - canceled');
          $table->integer('usedcoup_qty')->nullable();
          $table->boolean('is_shipping_different')->default(false);
          $table->timestamps();
          $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
