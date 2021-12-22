@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="">
                <h2>Create a book requisition</h2>
            </div>
        </div>
    </div>

    <form action="{{ route('requisition_store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Book:</strong>
                    <input type="text" class="form-control" value="{{ $book->title }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Note:</strong>
                    <textarea class="form-control" style="height:100px" name="note" placeholder="Note"></textarea>
                    <input type="hidden" class="form-control" name="book_id" value="{{ $book->id }}">
                </div>
            </div>
        </div>
        <div class="row py-sm-3">
            <div class="col-xs-12 col-sm-12 col-md-12">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>
    </form>
</div>

@endsection