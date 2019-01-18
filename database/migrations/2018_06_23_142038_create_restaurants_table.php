<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('profile')->default('default-rest-img.png');
          $table->string('status')->default('0');
          $table->string('openstatus')->default('closed');
          $table->string('paymentmethod');
          $table->string('banner')->nullable();
          $table->time('openingtime')->nullable();
          $table->time('closingtime')->nullable();
          $table->string('deliverytime')->nullable();
          $table->string('phone1')->nullable();
          $table->string('phone2')->nullable();
          $table->string('address')->nullable();
          $table->string('country')->nullable();
          $table->string('password');
          $table->rememberToken();
          $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
