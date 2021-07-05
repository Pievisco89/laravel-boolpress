<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //all'interno del metodo call() passo un array con tutti i nostri seeder da inviare
        $this->call([ 
            PostsTableSeeder::class,
            CategoriesTableSeeder::class,
            //UpdatePostsSeeder::class,
        ]);
    }
}
