<?php
namespace App\Domain\Services\External;

class BookParser 
{
    public function parse(array $book)
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

