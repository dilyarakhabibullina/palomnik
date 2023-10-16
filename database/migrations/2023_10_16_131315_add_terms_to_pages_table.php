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

            $table->text('terms_heading')->after('about_status');
            $table->text('terms_content')->after('terms_heading');
            $table->integer('terms_status')->after('terms_content');
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
            $table->dropColumn('terms_heading');
            $table->dropColumn('terms_content');
            $table->dropColumn('terms_status');
        });
    }
};
