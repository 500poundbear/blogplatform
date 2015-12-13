<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsPostsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('blogs', function(Blueprint $table){
		    $table->increments('id');
		    $table->string('title')->default('Empty blog title');
		    $table->string('description')->default('');
		    $table->string('type')->default('public');
		    
	    });
	    
	    Schema::create('posts', function (Blueprint $table){
		    $table->increments('id');
            $table->string('title')->default('No title');
            $table->string('summary')->default('');
            $table->integer('blog_id')->unsigned()->default(0);
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');	
            $table->integer('author_id')->unsigned()->default(0);
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');	
            $table->timestamps();
	    });
	    
	    Schema::create('comments', function(Blueprint $table){
			$table->increments('id'); 
		    $table->string('name')->default('guest');
		    $table->string('email')->default('');
		    $table->string('message')->default('');
		    $table->integer('post_id')->unsigned()->default(0);
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
			$table->timestamps();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop('comments');
        Schema::drop('posts');
        Schema::drop('blogs');
    }
}
