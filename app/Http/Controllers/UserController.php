<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function all()
    {

        $records = User::all();

        return response()->json([
            'data' => $records
        ], 200);
    }

    public function getUsers()
    {

        $records = User::where('role', 'user')->with('whishlist')->get();

        return response()->json([
            'data' => $records
        ], 200);
    }

    public function get($id)
    {
        $record = User::where('id', $id)->get();
        return response()->json([
            'data' => $record
        ], 200);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'string'
            ],
            'surname' => [
                'string'
            ],
            'sex' => [
                'string'
            ],
            'email' => [
                'required',
                'email'
            ],
            'password' => [
                'required',
                'string'
            ],
            'age' => [
                'integer'
            ],

        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->getMessageBag()
                    ->toArray()
            ], Response::HTTP_BAD_REQUEST);
        }   
        $data = $request->only(['email', 'password', 'role', 'name', 'surname','age','sex']);
        $record = User::find($request->get("id"));
        $body = $data;
        if (empty($record)) {
            return "No record found with id: " . $id;
        }
        
        $record->fill($body);
        $record->save();
        return $record; 
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => [
                'string'
            ],
            'surname' => [
                'string'
            ],
            'sex' => [
                'string'
            ],
            'email' => [
                'required',
                'string'
            ],
            'password' => [
                'required',
                'string'
            ],
            'age' => [
                'integer'
            ],

        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->getMessageBag()
                    ->toArray()
            ], Response::HTTP_BAD_REQUEST);
        }   
        $data = $request->only(['email', 'password', 'role', 'name', 'surname','age','sex']);
        $record = new User();
        $record->fill($data);
        $record->save();
        return $record; 
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return response()->json(['message' => 'Row deleted successfully']);
    }
    
}
