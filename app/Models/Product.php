<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'image',
        'quantity',
        'rate_average',
        'rate_count',
        'view_count',
        'category_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImagePath()
    {
        return asset('/' . config('settings.image_path') . '/' . $this->image);
    }

    public function showStatus()
    {
        return $this->status ? trans('product.active') : trans('product.disable');
    }

    public function getRateAverageAttribute($value)
    {
        return empty($value) ? config('settings.default_value') : $value;
    }

    public function getRateCountAttribute($value)
    {
        return empty($value) ? config('settings.default_value') : $value;
    }

    public function getViewCountAttribute($value)
    {
        return empty($value) ? config('settings.default_value') : $value;
    }
}
