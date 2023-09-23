<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $table = 'recipe';
    protected $fillable = [
        'name',
        'description',
        'image',
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
