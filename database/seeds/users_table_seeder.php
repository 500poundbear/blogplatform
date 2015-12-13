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
		    #['id' => 1, 'name'=>'Johnny Nitro', 'email'=>'johnnyn@gmail.com', 'password'=>']
	    );
	    
	    DB::table('users')->insert($users);
    }
}
