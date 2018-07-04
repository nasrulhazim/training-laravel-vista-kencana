<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        // truncate related tables
    	\App\Post::truncate();
        \App\User::truncate();

        Schema::enableForeignKeyConstraints();

    	// create 2 users
        factory(\App\User::class, 2)
	        ->create([
	        	'password' => bcrypt('password'),
	        ])
	        ->each(function($user){
	        	$this->command->info($user->email . ' created');
                // create 10 posts
                factory(\App\Post::class, 10)->create([
                    'user_id' => $user->id,
                ]);
	        });

        // create more posts for each user
        \App\User::all()->each(function($user){
            factory(\App\Post::class, 500)->create([
                    'user_id' => $user->id,
                ]);
        });  
    }
}
