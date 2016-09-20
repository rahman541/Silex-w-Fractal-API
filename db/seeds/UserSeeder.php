<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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
    	$faker->addProvider(new Faker\Provider\ru_RU\PhoneNumber($faker));
    	$type = ['customer','admin'];
    	$data = [];
    	for ($i = 0; $i < 10; $i++) {
        	$data[] = [
            	'type' => $faker->randomElement($type),
            	'email' => $faker->email,
            	'phone_no' => $faker->PhoneNumber,
            	'password' => $faker->word,
            	'name' => $faker->name,
            	'address' => $faker->address,
            	'created_at' => $faker->date,
            	'updated_at' => $faker->date
        	];
    	}
    	$product = $this->table('user');
        $product->insert($data)
              ->save();
    }
}
