<?php

use Illuminate\Database\Seeder;

class blogs_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->delete();
        
        $blogs = array(
	       	['id' => 1, 'title' => 'My First Blog', 'slug' => 'my_first_blog', 'description' => 'Welcome to my life', 'type' => 'public'], 
	       	['id' => 2, 'title' => 'Cow Universe', 'slug' => 'cow_universe', 'description' => 'Moo Moo', 'type' => 'private'], 
	       	['id' => 3, 'title' => 'My Exciting Blog', 'slug' => 'my_exciting_blog', 'description' => 'Learn more about me	', 'type' => 'public'], 
	       	['id' => 4, 'title' => 'Together we inspire', 'slug' => 'together_we_inspire', 'description' => 'Once a block, always a block', 'type' => 'public'], 
        );
        
        DB::table('blogs')->insert($blogs);
    }
}
