<?php

use Illuminate\Database\Seeder;

class users_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('users')->delete();
	    
	    $users = array(
		    
	    );
	    
	    DB::table('users')->insert($users);
    }
}
