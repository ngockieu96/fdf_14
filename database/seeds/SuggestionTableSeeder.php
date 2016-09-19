<?php

use Illuminate\Database\Seeder;
use App\Models\Suggestion;

class SuggestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suggestion::truncate();
        factory(Suggestion::class, 3)->create();
    }
}
