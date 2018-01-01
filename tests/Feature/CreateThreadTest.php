<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadTest extends TestCase
{
	use DatabaseMigrations;


	  public function test_guests_may_not_create_threads() 
   {

   	$this->withExceptionHandling();

   			$this->get('/threads/create')
   			->assertRedirect('/login');	
   	
    $this->withExceptionHandling();
    
        $this->post('/threads')
            ->assertRedirect('/login');
   }


    public function test_an_authenticated_user_can_create_new_forum_threads() 
   {
   	$this->signedIn(create('App\User'));

   	$thread = make('App\Thread');

   	$this->post('/threads', $thread->toArray());

   	$this->get($thread->path())
		->assertSee($thread->title)
   		->assertSee($thread->body);
   }

}
