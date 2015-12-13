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
		    [	
		    	'id' => 1,
		     	'name' => 'Johnny Nitro', 
		     	'email'=> 'abc@asdf.com', 
		     	'password' => '$2y$10$NWhPyzG77INI5TGaZs7TguTnUqnRlMLN2CmgHoP7HyyT.UswyGhby	1stvINwfhs6LbDl388UDZgz7OE9rtLpIgaSej3zf2pquRFrwZ4NaopxzVDI8',
		      	'created_at' => new DateTime(),
		      	'updated_at' => new DateTime()
		     ], 
			 [
			 	'id' => 2,
			 	'name' => 'Triple H', 
			 	'email'=> 'tripleh@wwe.com', 
			 	'password' => '$2y$10$w9KEclwetMqE58XDtfUBVeP1QyE61IHr90360NE6FSdVctx/lv0ky',
			 	'created_at' => new DateTime(),
			 	'updated_at' => new DateTime()
		     ],
		     [
			 	'id' => 3,
			 	'name' => 'John Cena', 
			 	'email'=> 'cenaj@wwe.com', 
			 	'password' => '$2y$10$IXi2Z6tqbVQ99BdMKOrqcO/TOh0uEJwNT5BrAGk5pXAB8ft3eI.m6',
			 	'created_at' => new DateTime(),
			 	'updated_at' => new DateTime()
		     ],
		     [
			 	'id' => 4,
			 	'name' => 'Undertaker', 
			 	'email'=> 'under@taker.com', 
			 	'password' => '$2y$10$kvEd.KA3/dHt43kr8Nxk5e/chB5RFK6xikPtpkpeLq6/MZRCUILaW',
			 	'created_at' => new DateTime(),
			 	'updated_at' => new DateTime()
		     ],
		); 
	   
	    DB::table('users')->insert($users);
    }
}
