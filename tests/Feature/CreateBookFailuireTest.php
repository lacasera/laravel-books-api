<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;


class CreateBookFailuireTest extends TestCase
{
    /**
     * @test
     */
    public function should_return_400_when_book_name_is_not_provided()
    {
        $data = factory(Book::class)->raw([
            'name' => ''
        ]);
        
        $response = $this->post('/api/v1/books', $data);

        $response->assertStatus(400);
    }

    /**
     * @test
     */
    public function should_return_400_when_book_isbn_is_not_provided()
    {
        $data = factory(Book::class)->raw([
            'isbn' => ''
        ]);
        
        $response = $this->post('/api/v1/books', $data);

        $response->assertStatus(400);
    }

    /**
     * @test
     */
    public function should_return_400_when_book_country_is_not_provided()
    {
        $data = factory(Book::class)->raw([
            'country' => ''
        ]);
        
        $response = $this->post('/api/v1/books', $data);

        $response->assertStatus(400);
    }

    /**
     * @test
     */
    public function should_return_400_when_book_publisher_is_not_provided()
    {
        $data = factory(Book::class)->raw([
            'publisher' => ''
        ]);
        
        $response = $this->post('/api/v1/books', $data);

        $response->assertStatus(400);
    }

    /**
     * @test
     */
    public function should_return_400_when_book_authors_is_not_provided()
    {
        $data = factory(Book::class)->raw([
            'authors' => ''
        ]);
        
        $response = $this->post('/api/v1/books', $data);

        $response->assertStatus(400);
    }

    /**
     * @test
     */
    public function should_return_400_when_book_release_date_is_not_provided()
    {
        $data = factory(Book::class)->raw([
            'release_date' => ''
        ]);
        
        $response = $this->post('/api/v1/books', $data);

        $response->assertStatus(400);
    }

     /**
     * @test
     */
    public function should_return_400_when_book_release_date_is_not_a_date()
    {
        $data = factory(Book::class)->raw([
            'release_date' => 'invalid date'
        ]);
        
        $response = $this->post('/api/v1/books', $data);

        $response->assertStatus(400);
    }

    /**
     * @test
     */
    public function should_return_400_when_book_number_of_pages_is_not_provided()
    {
        $data = factory(Book::class)->raw([
            'number_of_pages' => ''
        ]);
        
        $response = $this->post('/api/v1/books', $data);

        $response->assertStatus(400);
    }

    /**
     * @test
     */
    public function should_return_400_when_book_number_of_pages_is_not_an_interger()
    {
        $data = factory(Book::class)->raw([
            'number_of_pages' => 'number of books'
        ]);
        
        $response = $this->post('/api/v1/books', $data);

        $response->assertStatus(400);
    }
}
