<?php

namespace App\Adeva\Services\External;

use GuzzleHttp\Client;

class BookService 
{
    protected $guzzle;

    protected $endponit = "https://www.anapioficeandfire.com/api/books";


    public function __construct(Client $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function searchBooks($string = null) 
    {
        $url = is_null($string) ? $this->endponit : $this->endponit.'?name='.$string; 
        
        $response = $this->guzzle->get($url);

        $parsedBooks = collect([]);

        if($response->getStatusCode() === 200 ) {

            $externalBooks = json_decode($response->getBody()->getContents(), true);

            collect($externalBooks)->each(function($externalBook) use ($parsedBooks) {
                $parsedBooks->push( $this->parseBook($externalBook));
            });
        }

        return $parsedBooks->all();

    }

    private function parseBook($book)
    {
        return [
            "name" => $book['name'],
            "isbn" => $book['isbn'],
            "authors" => $book['authors'],
            "publisher" => $book['publisher'],
            "country" => $book['country'],
            "release_date" => date('y-m-d', strtotime($book['released'])) ,
            "number_of_pages" => $book['numberOfPages']
        ];
    }
}
