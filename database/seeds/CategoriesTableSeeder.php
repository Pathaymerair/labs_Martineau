<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $user = $users->random()->first();
        DB::table('categories')->insert([
            'nameCatego' => str_random(10),
            'user_id' => $user->id,
            'state_id'=> 1,
        ]);
    }
}
