<?php

use Illuminate\Database\Seeder;

class comments_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        
        $comments = array(
	       	['id'=>1, 'name'=>'Broke Lesnar', 'email'=>'buffy@buffytown.com', 
	       	 'message' => 'Ooh yah that\'s more like it keep pouring', 'post_id'=>1, 
	       	 'created_at' => new DateTime(), 'updated_at' => new Datetime()],
	       	['id'=>2, 'name'=>'Tom Jones', 'email'=>'manjones@sexbomb.com', 
	       	 'message' => 'And yes I must react to claims of those who say that you\'re not alright', 'post_id'=>1, 'created_at' => new DateTime(), 'updated_at' => new Datetime()], 
	       	['id'=>3, 'name'=>'Big Show', 'email'=>'bigmanshow@bigman.com', 
	       	 'message' => 'Well, it\'s the big show, it\'s the big man\'s show now', 'post_id'=>2, 
	       	 'created_at' => new DateTime(), 'updated_at' => new Datetime()],
        );
        
        DB::table('comments')->insert($comments);
    }
}
