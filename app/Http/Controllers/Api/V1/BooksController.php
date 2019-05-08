<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Domain\Services\External\BookService;
use App\Domain\Repositories\Book\BookRepository;

class BooksController extends Controller
{
    protected $bookModel;

    protected $bookRepository;

    public function __construct(Book $bookModel, BookRepository $bookRepository)
    {
        $this->bookModel = $bookModel;

        $this->bookRepository = $bookRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookRepository->findAll();

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'data' =>  $books
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        $book = $this->bookRepository->create(
            $request->all()
        );

        return response()->json([
            'status_code' => 201,
            'status' => 'success',
            'data' => array(
                'book' => $book
            )
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->bookRepository->findById($id);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'data' =>  $book ?? []
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $book = $this->bookRepository->update($request->all(), $id);
        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'message' => "The book {$book->name} has been updated successfully",
            'data' => $book
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book =  $this->bookRepository->delete($id);

        return response()->json([
            'status_code' => 204,
            'status' => 'success',
            'message' => "The book {$book->name} has been deleted successfully",
            'data' => $book
        ], 200);
    }

    public function search(Request $request)
    {
        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'data' =>  $this->bookRepository->search($request->get('query'))
        ], 200);
    }

    public function externalSearch(Request $request,  BookService $bookService)
    {
        $externalBook = $bookService->searchBooks(
            $request->get('name')
        );

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'data' =>  $externalBook
        ], 200);
         
    }
}
