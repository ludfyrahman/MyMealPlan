<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_category';
    protected $fillable = [
        'category_id',
        'name',
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function masterMenuDiet(){
        return $this->hasMany(MasterMenuDiet::class, 'subcategory_id', 'id');
    }

    public function siklusMenuDiet(){
        return $this->hasMany(SiklusMenuDiet::class, 'subcategory_id', 'id');
    }
}
