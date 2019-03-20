<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasedPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('package_id');
            $table->integer('paid_price');
            $table->integer('num_of_sessions');
            $table->integer('attended_sessions');
            $table->unsignedBigInteger('gym_id');


            $table->timestamps();
        });
    }

}
