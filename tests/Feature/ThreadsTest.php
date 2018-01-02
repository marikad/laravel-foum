<?php
 
namespace Tests\Feature;
 
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
 
class ThreadsTest extends TestCase
{
 use DatabaseMigrations;

 protected $thread;

 public function setUp() 
 {
    parent::setUp();

     $this->thread = factory('App\Thread')->create();
 }

 public function test_a_thread_can_make_a_string_path() 
 {
 	$thread = create('App\Thread');

 	// $this->assertEquals('/threads/' . $thread->channel->slug . '/' . $thread->id, $thread->path());

 	$this->assertEquals(
 			"/threads/{$thread->channel->slug}/{$thread->id}", $thread->path()
 		);
 }

 /**
 * A user can browse threads
 */

 public function test_a_user_can_browse_all_threads() 
 {
     $response = $this->get('/threads');

     $response->assertSee($this->thread->title);

    
 }

 public function test_a_user_can_browse_a_single_thread() 
 {
       
      $response = $this->get('/threads/' . $this->thread->channel . '/' . $this->thread->id);

     $response->assertSee($this->thread->title);
 }

 public function test_a_user_can_read_replies_associated_with_threads() 
 {
     $reply = factory('App\Reply')
     		->create(['thread_id' => $this->thread->id]);

 		$response = $this->get('/threads/' . $this->thread->channel . '/' . $this->thread->id)
 	                 ->assertSee($reply->body);
 }

 public function test_a_thread_has_replies() 
 {
 	$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
 }

 public function test_a_thread_has_a_creator() 
 {
 	$this->assertInstanceOf('App\User', $this->thread->owner);
 }

 public function test_thread_can_add_a_reply() 
 {
 	$this->thread->addReply([

 		'body' => 'FooBar',
 		'user_id' => 1

 	]);

 	$this->assertCount(1, $this->thread->replies);
 	
 }

 public function test_a_thread_belongs_to_a_channel() 
 {
 	  $thread = create('App\Thread');
        $this->assertInstanceOf('App\Channel', $thread->channel);
 }



}
