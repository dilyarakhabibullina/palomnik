<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderexcur_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('excursion_id');
            $table->text('order_no');
            $table->text('date');
            $table->text('time');
            $table->text('adult');
            $table->text('pensioner');
            $table->text('children');
            $table->text('kids');
            $table->text('subtotal');
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
        Schema::dropIfExists('orderexcur_details');
    }
};
