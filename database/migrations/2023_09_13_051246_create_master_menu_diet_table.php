<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterMenuDietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_menu_diet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->string('makan_pagi');
            $table->string('selingan_pagi');
            $table->string('makan_siang');
            $table->string('selingan_siang');
            $table->string('makan_malam');
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
        Schema::dropIfExists('master_menu_diet');
    }
}
