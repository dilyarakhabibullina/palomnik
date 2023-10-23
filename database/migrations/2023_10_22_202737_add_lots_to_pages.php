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
        Schema::table('pages', function (Blueprint $table) {

            $table->text('cart_heading')->after('blog_status');
            $table->integer('cart_status')->after('cart_heading');;
            $table->text('checkout_heading')->after('cart_status');;
            $table->integer('checkout_status')->after('checkout_heading');
            $table->text('payment_heading')->after('checkout_status');
            $table->text('signup_heading')->after('payment_heading');
            $table->integer('signup_status')->after('signup_heading');
            $table->text('signin_heading')->after('signup_status');
            $table->integer('signin_status')->after('signin_heading');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('cart_heading');
            $table->dropColumn('cart_status');
            $table->dropColumn('checkout_heading');
            $table->dropColumn('checkout_status');
            $table->dropColumn('payment_heading');
            $table->dropColumn('signup_heading');
            $table->dropColumn('signup_status');
            $table->dropColumn('signin_heading');
            $table->idropColumn('signin_status');
        });
    }
};
