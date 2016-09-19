<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(CategoryTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(SuggestionTableSeeder::class);
        Model::reguard();
    }
}
