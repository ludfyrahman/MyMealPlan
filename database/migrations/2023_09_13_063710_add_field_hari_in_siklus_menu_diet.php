<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldHariInSiklusMenuDiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siklus_menu_diet', function (Blueprint $table) {
            //
            $table->string('hari')->after('subcategory_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siklus_menu_diet', function (Blueprint $table) {
            //
            $table->dropColumn('hari');
        });
    }
}
