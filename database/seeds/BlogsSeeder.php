<?php

use Illuminate\Database\Seeder;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = \Faker\Factory::create();

        for($i=0; $i<=100; $i++):
            DB::table('blogs')
                ->insert([
                    'title' => $faker->sentence,
                    'body' => $faker->paragraph,
                    'user_id' => rand(1 , 100)
                ]);
        endfor;
    }
}
