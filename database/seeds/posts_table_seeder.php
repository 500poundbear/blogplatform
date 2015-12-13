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
			[
				'id' => 1, 
				'title' => 'Hello World', 
				'summary' => 'Blah blah blah this is the my first post. Insert promise here', 
				'content' => 'Blah blah blah this is the my first post. Insert promise here lol',
				'slug' => 'hello_world', 
				'blog_id' => 1, 
				'author_id' => 1, 
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			],
			[
				'id' => 2, 
				'title' => 'The world is a vampire', 
				'summary' => 'This is my second post but I am running out of steam', 
				'content' => 'This is my second post but I am running out of steam LOL',
				'slug' => 'the_world_is_a_vampire', 
				'blog_id' => 1, 
				'author_id' => 1, 
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			],
			[
				'id' => 3, 
				'title' => 'Yesterday Once More', 
				'summary' => 'Why do birds blah blah blah', 
				'content' => 'Why do birds suddenly appear, you ask. Blah blah balh',
				'slug' => 'yesterday_once_more', 
				'blog_id' => 1, 
				'author_id' => 1, 
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			],	
			[
				'id' => 4, 
				'title' => 'Yesterday Once More', 
				'summary' => 'Why do birds blah blah blah', 
				'content' => 'Why do birds suddenly appear, you ask. Blah blah balh',
				'slug' => 'yesterday_once_more', 
				'blog_id' => 2, 
				'author_id' => 2, 
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			],	
			[
				'id' => 5, 
				'title' => 'Yesterday Once More', 
				'summary' => 'Why do birds blah blah blah', 
				'content' => 'Why do birds suddenly appear, you ask. Blah blah balh',
				'slug' => 'yesterday_once_more', 
				'blog_id' => 3, 
				'author_id' => 1, 
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			],	
			[
				'id' => 6, 
				'title' => 'Yesterday Once More', 
				'summary' => 'Why do birds blah blah blah', 
				'content' => 'Why do birds suddenly appear, you ask. Blah blah balh',
				'slug' => 'yesterday_once_more', 
				'blog_id' => 4, 
				'author_id' => 3, 
				'created_at' => new DateTime(),
				'updated_at' => new DateTime()
			],	
					
		);
	    
	    DB::table('posts')->insert($posts);
    }
}
