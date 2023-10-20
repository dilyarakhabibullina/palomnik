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
            $table->text('privacy_heading')->after('terms_status');
            $table->text('privacy_content')->after('privacy_heading');
            $table->integer('privacy_status')->after('privacy_content');

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
            $table->dropColumn('privacy_heading');
            $table->dropColumn('privacy_content');
            $table->dropColumn('privacy_status');
        });
    }
};
