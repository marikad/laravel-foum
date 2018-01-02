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

   	$response = $this->post('/threads', $thread->toArray());


   	$this->get($response->headers->get('Location'))
		->assertSee($thread->title)
   		->assertSee($thread->body);
   }


   public function test_a_thread_requires_a_title() 
   {

    $this->publishThread(['title' => null])
        ->assertSessionHasErrors('title');


   }

      public function test_a_thread_has_a_valid_channel_id() 
   {

    factory('App\Channel', 2)->create();

    $this->publishThread(['channel_id' => null])
        ->assertSessionHasErrors('channel_id');

        $this->publishThread(['channel_id' => 999])
        ->assertSessionHasErrors('channel_id');


   }

      public function test_a_thread_requires_a_channel_id() 
   {

    $this->publishThread(['channel_id' => null])
        ->assertSessionHasErrors('channel_id');

   }

   public function publishThread($overrides = []) 
   {
     
     $this->withExceptionHandling()->signedIn();

     $thread = make('App\Thread', $overrides);

    return $this->post('/threads', $thread->toArray());
   }

}
