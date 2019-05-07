<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksFeatureTest extends TestCase
{
    /**
     * @test
     */
    public function create_book()
    {

        $data = factory(Book::class)->raw();
        
        $response = $this->post('/api/v1/books', $data);

        $results = json_decode($response->getContent());

        $response->assertStatus(201);

        $this->assertDatabaseHas('books', $data);
        $this->assertEquals($results->status_code, 201);
        $this->assertEquals($results->status, 'success');
        $this->assertObjectHasAttribute('data', $results);
        $this->assertIsArray($results->data->book->authors);
    }

    /**
     * @test
     */
    public function get_books()
    {
        factory(Book::class, 10)->create();

        $response = $this->get('/api/v1/books');
        $results = json_decode($response->getContent());

        $response->assertStatus(200);
        $this->assertEquals($results->status_code, 200);
        $this->assertEquals($results->status, 'success');
        $this->assertObjectHasAttribute('data', $results);
    }

    /**
     * @test
     */
    public function get_a_book()
    {
        $book = factory(Book::class)->create();
        $response = $this->get('/api/v1/books/'.$book->id);

        $results = json_decode($response->getContent());

        $response->assertStatus(200);
        $this->assertEquals($results->status_code, 200);
        $this->assertEquals($results->status, 'success');
        $this->assertObjectHasAttribute('data', $results);
        $this->assertEquals($book->id, $results->data->id);

    }

    /**
     * @test
     */
    public function update_a_book()
    {
        $book = factory(Book::class)->create();


        $response = $this->patch('/api/v1/books/'.$book->id, [
            'name' => 'Intergalactic Avenger'
        ]);


        $results = json_decode($response->getContent());

        $response->assertStatus(200);
        $this->assertEquals($results->status_code, 200);
        $this->assertEquals($results->status, 'success');
        $this->assertObjectHasAttribute('message', $results);
        $this->assertEquals($results->message, "The book {$results->data->name} has been updated successfully");
    }

    /**
     * @test
     */
    public function delete_a_book()
    {
        $book = factory(Book::class)->create();

        $response = $this->delete('/api/v1/books/'.$book->id);

        $results = json_decode($response->getContent());

        $response->assertStatus(200);

        $this->assertEquals($results->status_code, 204);
        $this->assertEquals($results->status, 'success');
        $this->assertEquals($results->message, "The book {$results->data->name} has been deleted successfully");

    }
}
