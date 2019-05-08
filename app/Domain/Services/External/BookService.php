<?php

namespace App\Domain\Services\External;

use GuzzleHttp\Client;

class BookService 
{
    protected $guzzle;

    protected $endponit = "https://www.anapioficeandfire.com/api/books";

    protected $bookParser;

    public function __construct(Client $guzzle, BookParser $bookParser)
    {
        $this->guzzle = $guzzle;
        $this->bookParser = $bookParser;

    }

    public function searchBooks($string = null) 
    {
        $url = is_null($string) ? $this->endponit : $this->endponit.'?name='.$string; 
        
        $response = $this->guzzle->get($url);

        $parsedBooks = collect([]);

        if($response->getStatusCode() === 200 ) {

            $externalBooks = json_decode($response->getBody()->getContents(), true);

            collect($externalBooks)->each(function($externalBook) use ($parsedBooks) {
                $parsedBooks->push( $this->bookParser->parse($externalBook));
            });
        }

        return $parsedBooks->all();

    }
}
