<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'name' => $faker->name,
        'password' => $faker->name . $faker->year,
        'phone' => $faker->phoneNumber,
        'avatar' => $faker->imageUrl(100, 100),
        'address' => $faker->address,
        'role' => 0,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    static $categoryIds;

    return [
        'name' => $faker->name,
        'category_id' => $faker->randomElement($categoryIds ?: $categoryIds = App\Models\Category::pluck('id')->toArray()),
        'price' => $faker->randomFloat(2, 1, 20),
        'quantity' => $faker->numberBetween(1, 20),
        'rate_average' => $faker->numberBetween(1, 5),
        'rate_count' => $faker->numberBetween(1, 10),
        'status' => $faker->boolean,
        'view_count' => $faker->numberBetween(1, 50),
        'image' => $faker->imageUrl(200, 200),
        'description' => $faker->paragraph,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    static $productIds;
    static $userIds;

    return [
        'product_id' => $faker->randomElement($productIds ?: $productIds = App\Models\Product::pluck('id')->toArray()),
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\User::pluck('id')->toArray()),
        'content' => $faker->paragraph,
        'rate' => $faker->numberBetween(1, 5),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\Suggestion::class, function (Faker\Generator $faker) {
    static $categoryIds;
    static $userIds;

    return [
        'category_id' => $faker->randomElement($categoryIds ?: $categoryIds = App\Models\Category::pluck('id')->toArray()),
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\User::pluck('id')->toArray()),
        'name' => $faker->name,
        'image' => $faker->imageUrl(200, 200),
        'description' => $faker->paragraph,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\Order::class, function (Faker\Generator $faker) {
    static $userIds;

    return [
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\User::pluck('id')->toArray()),
        'price' => $faker->randomFloat(2, 1, 20),
        'name' => $faker->name,
        'status' => $faker->numberBetween(0, 2),
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'address' => $faker->address,
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

$factory->define(App\Models\Item::class, function (Faker\Generator $faker) {
    static $productIds;
    static $orderIds;

    return [
        'product_id' => $faker->randomElement($productIds ?: $productIds = App\Models\Product::pluck('id')->toArray()),
        'order_id' => $faker->randomElement($orderIds ?: $orderIds = App\Models\Order::pluck('id')->toArray()),
        'quantity' => $faker->numberBetween(1, 3),
        'price' => $faker->randomFloat(2, 1, 50),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
