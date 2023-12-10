<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandartPorsi extends Model
{
    use HasFactory;
    protected $table = 'standart_porsi';
    protected $fillable = [
        'image',
    ];
    public function getImageAttribute($value)
    {
        return asset('storage/standart/'.$value);
    }
}
