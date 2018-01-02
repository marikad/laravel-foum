<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInFormTest extends TestCase
{
	use DatabaseMigrations;
  

public function test_unauthenticated_users_may_not_add_replies() 
{
	   	$this->withExceptionHandling();

	$this->post('/threads/some-channel/1/replies', [])
		->assertRedirect('/login');


}


	public function test_an_authenticated_user_may_participate_in_form_threads() 
	{
		
		$this->signedIn(create('App\User'));

		$thread = create('App\Thread');



		$reply = make('App\Reply');
		$this->post($thread->path().'/replies' , $reply->toArray());

		$this->get($thread->path())->assertSee($reply->body);
		
	}


	public function test_a_reply_requires_a_body() 
	{
		$this->withExceptionHandling()->signedIn();


		$thread = create('App\Thread');

		$reply = make('App\Reply', ['body' => null]);

		$this->post($thread->path() . '/replies', $reply->toArray())
			->assertSessionHasErrors('body');


	}



}
