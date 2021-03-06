<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            $new_post = new Post();
            $new_post->title = 'Questi sono i titoli dei post'.($i + 1);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = ($i + 1) . 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure ipsa officiis, minus odit modi sit alias vero debitis architecto ut. Consequatur obcaecati recusandae, dolores aut dolorem odit alias amet eveniet.';
            $new_post->save();
        }
    }
}
