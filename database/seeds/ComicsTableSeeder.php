<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Comic;
use Faker\Generator as Faker;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $comics = config('product-data');

        foreach ($comics as $comic) {
           $new_comic = new Comic();

            $new_comic->title= $comic['title'];
            $new_comic->slug = Str::slug($new_comic->title, '-');
            $new_comic->description= $comic['description'];
            $new_comic->thumb= $comic['thumb'];
            $new_comic->series= $comic['series'];
            $new_comic->price= $comic['price'];
            $new_comic->sale_date= $comic['sale_date'];
            $new_comic->type= $comic['type'];
            $new_comic->artists= $faker->text(20);
            $new_comic->writers= $faker->text(20);

            $new_comic->save();
        }
    }
}