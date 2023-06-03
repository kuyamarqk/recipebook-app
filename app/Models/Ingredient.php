<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['details', 'recipe_id'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
