<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeConsultationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('consultation', function (Blueprint $table) {
            //
            // change user_id to pasien_id
            $table->renameColumn('consultant_id', 'pasien_id');
            $table->dropColumn('reservation_date');
            $table->dropColumn('status');
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        //
        Schema::table('consultation', function (Blueprint $table) {
            //
            $table->renameColumn('pasien_id', 'consultant_id');
            $table->string('reservation_date')->after('consultant_id')->nullable();
            $table->string('status')->after('reservation_date')->nullable();
            $table->dropColumn('description');
        });
    }
}
