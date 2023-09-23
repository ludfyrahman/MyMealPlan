<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    use HasFactory;
    protected $table = 'recipe_category';
    protected $fillable = [
        'recipe_id',
        'category_id',
    ];

    /**
     * Get the category that owns the RecipeCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
