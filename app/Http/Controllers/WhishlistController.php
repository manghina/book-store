<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Whishlist;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class WhishlistController extends Controller
{
    public function set(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => [
                'integer',
                'required'                
            ],
            'user_id' => [
                'integer',
                'required'                
            ],
            'value' => [
                'integer',
                'required'                
            ]
        ]);

        $data = $request->only([ 'book_id', 'user_id', 'value']);
        User::findOrFail($data['user_id']);
        Book::findOrFail($data['book_id']);


        if($data['value'] === 0) {
            $record = Whishlist::where('user_id', $data['user_id'])->where('book_id', $data['book_id'])->get();
            if(count($record) > 0)
                $record[0]->delete();
        } else {
            $record = new Whishlist();
            $record->fill($data);
            $record->save();
        }
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->getMessageBag()
                    ->toArray()
            ], Response::HTTP_BAD_REQUEST);
        }   
        return  response()->json(['success' => 'true'], 200);
    }
    
}
