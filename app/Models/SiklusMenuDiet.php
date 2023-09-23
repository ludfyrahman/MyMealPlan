<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiklusMenuDiet extends Model
{
    use HasFactory;
    protected $table = 'siklus_menu_diet';
    protected $fillable = [
        'subcategory_id',
        'hari',
        'makan_pagi',
        'selingan_pagi',
        'makan_siang',
        'selingan_siang',
        'makan_malam',
    ];
}
