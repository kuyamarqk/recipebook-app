<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Photo;

class Recipe extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'short_description', 'description', 'user_id'];

    public function photo()
    {
        return $this->hasOne(Photo::class);
    }
    public function procedure()
    {
        return $this->hasOne(Procedure::class);
    }
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
    public function user()
    {
        return $this->belongsTo(Recipe::class);
    }

    public static function getAllRecipe()
    {
        return self::with('photo')->get();
    }

    public static function getRecipeById($id)
    {
        return self::with('photo')->find($id);
    }

    public static function searchRecipe($search)
    {
        return self::with('photo')->where('name', 'LIKE', '%' . $search . '%')->get();
    }
}
