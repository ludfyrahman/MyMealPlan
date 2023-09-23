<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_profile')->insert([
            'name' => 'SMK PGRI 2 BONDOWOSO',
            'address' => 'Jl. Saliwiryo Pranowo Gg. TamanNo. 25',
            'description' => '-',
            'email' => 'smkpgri2.bondowoso@gmail.com',
            'facebook' => '-',
            'instagram' => '-',
            'twitter' => '-',
            'phone' => '0',
            'logo' => '',
            'white_logo' => '',
            'intro' => '',
            'visi' => '',
            'misi' => '',
        ]);
    }
}
