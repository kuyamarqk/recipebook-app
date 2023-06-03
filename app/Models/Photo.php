<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'src' , 'recipe_id'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
