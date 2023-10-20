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
            $table->text('contact_heading')->after('privacy_status');
            $table->text('contact_map')->nullable()->after('contact_heading');
            $table->integer('contact_status')->after('contact_map');
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
            $table->dropColumn('contact_heading');
            $table->dropColumn('contact_map');
            $table->dropColumn('contact_status');
        });
    }
};
