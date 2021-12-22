<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRequisition;
use App\Models\Book;

class BookRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        if($user->hasRole('Admin') !== true){
            return redirect('/home');
        }

        $book_requisitions = BookRequisition::latest()->paginate(5);
        return view('book_requisitions.index',compact('book_requisitions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function requisition($book_id){
        $book_requisitioned = BookRequisition::whereIn('status', [0, 1])
            ->where('book_id', $book_id)
            ->latest()->get();
        if($book_requisitioned->count() != 0){
            return redirect()->route('books.index')
                ->with('success','This book has been taken by another user.');
        }else{
            $book = Book::where('id', $book_id)->first();
            return view('book_requisitions.requisition', compact('book'));
        }
    }

    public function requisition_store(Request $request){
        $request_data['book_id'] = $request->book_id;
        $request_data['user_id'] = auth()->id();
        $request_data['requisition_date'] = date('Y-m-d');
        $request_data['note'] = $request->note;
        $request_data['status'] = 0;

        BookRequisition::create($request_data);

        return redirect()->route('books.index')
            ->with('success','Requisition created successfully.');
    }

    public function approve_requisition($requisition_id){
        BookRequisition::where('id', $requisition_id)
            ->update(['status' => 1]);

        return redirect()->route('book_requisition')
            ->with('success','Requisition has been approved.');
    }

    public function get_returned($requisition_id){
        $request_data['return_date'] = date('Y-m-d');
        $request_data['status'] = 2;

        BookRequisition::where('id', $requisition_id)
            ->update($request_data);

        return redirect()->route('book_requisition')
            ->with('success','Book has been returned.');
    }
}
