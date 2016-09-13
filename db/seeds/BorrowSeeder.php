<?php

use Phinx\Seed\AbstractSeed;

class BorrowSeeder extends AbstractSeed
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
    	$faker = \Faker\Factory::create('en_EN');
    	$data = [];
    	for($i=0; $i<10; $i++){
    		$data[] = [
    			'book_id'=>$faker->randomFloat(0,1,10),	// 1-10
    			'user_id'=>$faker->randomFloat(0,1,10),	// 1-10
    			'return_date'=>$faker->date,
    			'created_at'=>$faker->date,
    			'updated_at'=>$faker->date
    		];
    	}

    	$table = $this->table('borrow');
    	$table->insert($data)->save();
    }
}
