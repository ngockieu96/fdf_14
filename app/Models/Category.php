<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Suggestion;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function suggestions()
    {
        return $this->hasMany(Suggestion::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
