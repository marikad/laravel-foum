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

	$this->post('/threads/1/replies', []);


}


	public function test_an_authenticated_user_may_participate_in_form_threads() 
	{
		
		$this->signedIn(create('App\User'));

		$thread = create('App\Thread');



		$reply = make('App\Reply');
		$this->post($thread->path().'/replies' , $reply->toArray());

		$this->get($thread->path())->assertSee($reply->body);
		
	}



}
