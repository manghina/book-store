<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

    public function all()
    {
        $user = request()->user() ?? '';
        $books = Book::withWishlistFlag($user->id ?? '')->get();
        return response()->json([
            'data' => $books
        ], 200);
    }

    public function get($id)
    {
        $record = Book::where('id', $id)->get();
            return response()->json([
                'data' => $record[0]
            ], 200);
    }

    public function getView($id)
    {
        $record = Book::where('id', $id)->get();
            return response()->json([
                'data' => $record[0]
            ], 200);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'string',
                'required'
            ],
            'description' => [
                'string',
                'required'
            ],
            'photo' => [
                'string',
                'required'
            ],
            'price' => [
                'required'                
            ],
            'author' => [
                'string'                
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->getMessageBag()
                    ->toArray()
            ], 500);
        }   

        $data = $request->only([ 'name', 'description','photo','price','author']);
        $record = Book::find($request->get("id"));
        if (empty($record)) {
            return "No record found with id: " . $id;
        }

        $record->fill($data);
        $record->save();
        return $record;
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'string',
                'required'
            ],
            'description' => [
                'string',
                'required'
            ],
            'photo' => [
                'string',
                'required'
            ],
            'price' => [
                'required'                
            ],
            'author' => [
                'string'                
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->getMessageBag()
                    ->toArray()
            ], Response::HTTP_BAD_REQUEST);
        }   
        $data = $request->only([ 'name', 'description','photo','price','author']);
        $record = new Book();
        $record->fill($data);
        $record->save();
        return $record;
    }

    public function delete($id)
    {
        Book::where('id', $id)->delete();
        return response()->json(['message' => 'Row deleted successfully']);
    }

}
