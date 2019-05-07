<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;

class BooksController extends Controller
{
    protected $bookModel;

    public function __construct(Book $bookModel)
    {
        $this->bookModel = $bookModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookModel->all();

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
    public function store(Request $request)
    {
        $book = $this->bookModel->create($request->all());

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
        $book = $this->bookModel->findOrFail($id);

        return response()->json([
            'status_code' => 200,
            'status' => 'success',
            'data' =>  $book
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
        $this->bookModel->where('id', $id)->update($request->all());
        $book = $this->bookModel->find($id);
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
        $book = $this->bookModel->find($id);
        $this->bookModel->where('id', $id)->delete();
    
        return response()->json([
            'status_code' => 204,
            'status' => 'success',
            'message' => "The book {$book->name} has been deleted successfully",
            'data' => $book
        ], 200);
    }
}
