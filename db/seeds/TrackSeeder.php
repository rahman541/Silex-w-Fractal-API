<?php

use Phinx\Seed\AbstractSeed;

class TrackSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
    	$faker = Faker\Factory::create('en_EN');
    	$data = [];
    	for ($i = 0; $i < 10; $i++) {
        	$data[] = [
            	'title' => $faker->sentence,
            	'artist_name' => $faker->name,
            	'artist_website' => $faker->url,
            	'album_name' => $faker->word,
            	'album_release' => $faker->realText(22),
            	'album_label' => $faker->realText(20),
            	'created_at' => $faker->date,
            	'updated_at' => $faker->date
        	];
    	}
    	$product = $this->table('tracks');
        $product->insert($data)
              ->save();
    }
}
