<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldInPasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasien', function (Blueprint $table) {
            //
            // add jenis_diet, jumlah_kalori, jumlah_protein, jumlah_lemak, jumlah_karbohidrat
            $table->string('jenis_diet')->nullable();
            $table->string('jumlah_kalori')->nullable();
            $table->string('jumlah_protein')->nullable();
            $table->string('jumlah_lemak')->nullable();
            $table->string('jumlah_karbohidrat')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasien', function (Blueprint $table) {
            //
        });
    }
}
