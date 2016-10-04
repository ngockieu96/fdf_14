<?php

return [
    'avatar_path' => 'uploads/images',
    'avatar_default' => 'default.jpg',
    'category_per_page' => '3',
    'user_per_page' => '4',
    'product_per_page' => '2',
    'order_per_page' => '3',
    'default_rate_average' => '0',
    'default_rate_count' => '0',
    'default_view_count' => '0',
    'image_path' => 'uploads/products',
    'step_of_price' => '0.01',
    'min_price_product' => '0',
    'min_quantity_product' => '1',
    'default_value' => '0',
    'default_quantity' => '1',
    'default_cart' => '0',
    'default_status' => '0',
    'default_count_item' => '1',
    'product' => [
        'status' => ['Disable', 'Active'],
    ],
    'order' => [
        'status' => ['unpaid', 'paid', 'cancel'],
    ],
    'low_min' => '0',
    'low_max' => '10',
    'medium_max' => '20',
    'default_category_id' => '0',
    'default_rating' => 'desc',
    'default_price' => 'low',
    'low' => 'low',
    'medium' => 'medium',
    'high' => 'high',
    'all' => 'All',
    'filter' => [
        'price' => [
            'all' => 'All',
            'low' => '0 - 10 USD',
            'medium' => '10 - 20 USD',
            'high' => '> 20 USD',
        ],
        'orderby' => [
            'desc' => 'Highest first',
            'asc' => 'Lowest first',
        ],
    ],
    'min_quantity_order' => '1',
];
