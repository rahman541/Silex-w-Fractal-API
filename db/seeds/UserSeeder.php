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
    	$faker = Faker\Factory::create('ru_RU');
    	$type = ['customer','admin'];
    	$data = [];
    	for ($i = 0; $i < 10; $i++) {
        	$data[] = [
            	'type' => $faker->randomElement($type),
            	'email' => $faker->email,
            	'phone_no' => $faker->phoneNumber,
            	'password' => $faker->password,
            	'name' => $faker->name,
            	'address' => $faker->address
        	];
    	}
    	$product = $this->table('user');
        $product->insert($data)
              ->save();
    }
}
