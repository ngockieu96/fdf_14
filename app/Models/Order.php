<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    const UNPAID = 0;
    const PAID = 1;
    const CANCEL = 2;

    protected $fillable = [
        'user_id',
        'price',
        'status',
        'name',
        'phone',
        'address',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function isUnpaid()
    {
        return $this->status == Order::UNPAID;
    }

    public function isPaid()
    {
        return $this->status == Order::PAID;
    }

    public function isCancel()
    {
        return $this->status == Order::CANCEL;
    }
}
