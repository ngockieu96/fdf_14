<?php

namespace App;

class ProductFilters extends QueryFilter
{
    public function rating($rating)
    {
        return $this->builder->orderBy('rate_average', $rating);
    }

    public function category_id($categoryId = null)
    {
        return !empty($categoryId) ? $this->builder->where('category_id', $categoryId) : $this;
    }

    public function price($price)
    {
        if (empty($price)) {
            return $this;
        }

        switch ($price) {
            case config('settings.low'):
                return $this->builder->where('price', '>', config('settings.low_min'))
                      ->where('price', '<', config('settings.low_max'));
            case config('settings.medium'):
                return $this->builder->where('price', '>=', config('settings.low_max'))
                      ->where('price', '<', config('settings.medium_max'));
            case config('settings.high'):
                return $this->builder->where('price', '>=', config('settings.medium_max'));
            default:
                return $this;
        }
    }
}
