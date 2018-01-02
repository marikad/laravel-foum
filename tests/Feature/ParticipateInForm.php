<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInFormTest extends TestCase
{
  
	public function test_an_authenticated_user_may_participate_in_form_threads() 
	{
		
		$this->signedIn($user = factory('App\User')->create());

		$thread = factory('App\Thread')->create();

		$this->post('/threads/'. $thread->id .'/repiles', $reply->toArray());

		$this->get($thread->path())->assertSee($reply->body);
		
	}



}
