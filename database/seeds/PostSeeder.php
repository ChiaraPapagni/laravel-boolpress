<?php

use Faker\Generator as Faker;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $post = new Post();
            $post->title = $faker->sentence();
            /* $post->image = $faker->imageUrl(600, 400, 'Posts'); */
            $post->image =
                'placeholders/' .
                $faker->image(
                    'public/storage/placeholders/',
                    1200,
                    480,
                    'Posts',
                    false,
                    true,
                    $post->title
                );
            $post->content = $faker->paragraph(10, true);
            $post->save();
        }
    }
}