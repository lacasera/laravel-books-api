<?php

namespace App\Adeva\Repositories\Book;

use App\Models\Book;

class BookRepository
{
    protected $bookModel;

    public function __construct(Book $bookModel)
    {
        $this->bookModel = $bookModel;
    }

    public function create(array $data)
    {
        return $this->bookModel->create($data);
    }

    public function update(array $data, $id)
    {
        $this->bookModel->where('id', $id)
            ->update($data);

        return $this->findById($id);
    }

    public function findById($id)
    {
        return $this->bookModel->findOrFail($id);
    }

    public function findAll()
    {
       return $this->bookModel->all();   
    }

    public function delete($id)
    {
        $book = $this->findById($id);
        $this->bookModel->where('id', $id)->delete();
        return $book;
    }

    public function search($query)
    {

        $books = Book::where("name", "LIKE", "%$query%")
                    ->orWhere("country", "LIKE", "%$query%")
                    ->orWhere("publisher", "LIKE", "%$query%")
                    ->orWhere("release_date", "LIKE", "%$query%")
                    ->get();

        return $books;
    }
}
