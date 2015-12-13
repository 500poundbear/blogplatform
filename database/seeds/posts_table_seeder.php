<?php

use Illuminate\Database\Seeder;

class posts_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('posts')->delete();
	    
	    $posts = array(
			['id' => 1, 
			'title' => 'Hello World', 
			'summary' => 'Blah blah blah this is the my first post. Insert promise here', 
			'blog_id' => 1
			'author_id' => 1
			'created_at' => new DateTime(),
			'updated_at' => new DateTime()
			],  
		    
	    );
	    
	    DB::table('posts')->insert($posts);
    }
}
