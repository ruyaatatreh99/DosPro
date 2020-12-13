<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->call('post', '/');
        $this->assertEquals(200, $response->status());
        
           $book = factory('App\book')->create();
           $this->actingAs($book) ->get('/buy');
        
        
          Cache::shouldReceive('get')
                    ->once()
                    ->with('id')
                    ->andReturn('value');

        $this->get('/books');
    }
}
