<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(){
        // check login user
        $user = Auth::user();
        if(!is_null($user)){
            $books = Book::all();

            if(count($books) > 0){
                return response()->json(['status' => 'success', 'count' => count($books), 'data' => $books], 200);
            }else{
                return response()->json(['status' => 'failed', 'message' => 'No book found!'], 200);
            }
        }
    }

    public function get_books(){
        return Book::latest()->paginate(5);
    }

    public function store(Request $request){
        $authUser = Auth::user();

        if(!is_null($authUser)){
            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'author_id' => 'required',
                'title' => 'required'
            ]);

            if($validator->fails()){
                return response()->json(['status' => 'failed', 'validation_errors' => $validator->errors()]);
            }

            $inputs = $request->all();
            $inputs['status'] = 0;
            $book = Book::create($inputs);

            if(!is_null($book)){
                return response()->json(['status' => 'success', 'message' => 'Book added successfully.', 'data' => $book], 200);
            }else{
                return response()->json(['status' => 'failed', 'message' => 'Book not added']);
            }
        }
    }

    public function show($id){
        $authUser = Auth::user();
        if(!is_null($authUser)){
            $book = Book::find($id);

            if(!is_null($book)){
                return response()->json(['status' => 'success', 'message' => 'Book found.', 'data' => $book], 200);
            }else{
                return response()->json(['status' => 'failed', 'message' => 'Book not found']);
            }
        }else{
            return response()->json(['status' => 'failed', 'message' => 'Unauthorised user'], 403);
        }
    }

    public function update(Request $request, Book $book){
        $authUser = Auth::user();
        if(!is_null($authUser)){
            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'author_id' => 'required',
                'title' => 'required'
            ]);

            if($validator->fails()){
                return response()->json(['status' => 'failed', 'validation_errors' => $validator->errors()]);
            }

            $update = $book->update($request->all());
            if(!is_null($update)){
                return response()->json(['status' => 'success', 'message' => 'Book updated successfully.', 'data' => $book], 200);
            }else{
                return response()->json(['status' => 'failed', 'message' => 'Book not updated']);
            }
        }else{
            return response()->json(['status' => 'failed', 'message' => 'Unauthorised user'], 403);
        }
    }

    public function destroy($id){
        $userAuth = Auth::user();
        if(!is_null($userAuth)){
            $delete = Book::where('id', $id)->delete();
            if($delete){
                return response()->json(['status' => 'success', 'message' => 'Book deleted successfully.'], 200);
            }
            return response()->json(['status' => 'failed', 'message' => 'Book delete fail.'], 203);
        }else{
            return response()->json(['status' => 'failed', 'message' => 'Unauthorised user'], 403);
        }
    }
}