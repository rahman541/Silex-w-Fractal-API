<?php

use Phinx\Seed\AbstractSeed;

class BookSeeder extends AbstractSeed
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
    	$data = [];
    	$faker = Faker\Factory::create('en_RU');
    	for($i=0; $i<10; $i++){
    		$data[] = [
    			'author' => $faker->firstName,
    			'title' => $faker->realText(10),
    			'price' => $faker->randomFloat(2,10,200),	// ie 129.95
    			'available' => $faker->word,
            	'created_at' => $faker->date,
            	'updated_at' => $faker->date
    		];
    	}

    	$table = $this->table('book');
    	$table->insert($data)->save();
    }
}
