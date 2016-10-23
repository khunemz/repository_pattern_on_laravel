<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Faker;
class BlogTest extends TestCase
{
    protected $_faker;
    /**
     * Perform test without any Middleware
     */
    use WithoutMiddleware;

    public function setUP() 
    {
      parent::setUp();
      $this->_faker = Faker::create();
    }
    
    /**
     * test should return blogs json with status code 200
     */
    /** @test */
    public function it_should_return_blogs()
    {
      $response = $this->call('GET' , '/blogs');
      $this->assertEquals(200 , $response->status());
    }
    /**
     * it should return a single record
     */
    /** @test */
    public function it_should_return_a_blog () 
    {
        $response = $this->call('GET' , '/blogs/' . $this->_faker->numberBetween(1, 100));
        $this->assertResponseOk();
    }

    /** @test */
    public function it_should_post_and_return_a_blog()
    {
        $response = $this->call('POST' , '/blogs' , 
            [ 'title' => $this->_faker->sentence(1) , 
              'body' => $this->_faker->text(300) , 
              'user_id' => $this->_faker->numberBetween(1, 100)]
        );
        $this->assertResponseOk();
    }

    /** @test */
    public function it_should_update_and_return_a_blog ()
    {
      $response = $this->call('PATCH' , '/blogs/' . $this->_faker->numberBetween(1, 100), 
            [ 'title' => $this->_faker->sentence(1) , 
              'body' => $this->_faker->text(300) , 
              'user_id' => $this->_faker->numberBetween(1, 100)]
        );
      $this->assertResponseOk();
    }

    /** @test */
    public function it_should_delete_and_return_null ()
    {
      $response = $this->call('DELETE' , '/blogs/' . $this->_faker->numberBetween(100, 110));
      $this->assertEquals(200 , $response->status());
    }

}
