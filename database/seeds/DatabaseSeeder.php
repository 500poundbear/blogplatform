<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call('users_table_seeder');
		$this->call('blogs_table_seeder');
		$this->call('posts_table_seeder');
        Model::reguard();
    }
}
