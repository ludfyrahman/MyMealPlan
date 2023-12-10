<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $fillable = [
        'nama',
        'no_rm',
        'umur',
        'tb',
        'bb',
        'riwayat_penyakit',
        'jenis_diet',
        'jumlah_kalori',
        'jumlah_protein',
        'jumlah_lemak',
        'jumlah_karbohidrat',
    ];
}
