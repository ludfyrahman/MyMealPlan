<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $table = 'consultation';
    protected $fillable = [
        'user_id',
        'pasien_id',
        'description',
    ];

    /**
     * Get all of the category for the Recipe
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category()
    {
        return $this->hasMany(RecipeCategory::class, 'recipe_id', 'id');
    }
}
