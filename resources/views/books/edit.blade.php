@extends('layouts.app')


@section('content')

<div class="container">
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>
                Edit Book

                <a class="btn btn-primary btn-sm float-sm-end" href="{{ route('books.index') }}"> Back</a>
            </h2>

        </div>

    </div>

</div>


@if ($errors->any())

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif


<form action="{{ route('books.update',$book->id) }}" method="POST">

    @csrf

    @method('PUT')


    <div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group">

                <strong>Category:</strong>

                {!! Form::select('category_id', $categories,$book->category_id, array('class' => 'form-select', 'placeholder' => 'Select Category')) !!}

            </div>

        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group">

                <strong>Author:</strong>

                {!! Form::select('author_id', $authors,$book->author_id, array('class' => 'form-select', 'placeholder' => 'Select Author')) !!}

            </div>

        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group">

                <strong>Title:</strong>

                <input type="text" name="title" value="{{ $book->title }}" class="form-control" placeholder="Name">

            </div>

        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">

            <div class="form-group">

                <strong>Status:</strong>

                {!! Form::select('status', [0=>'Unapproved', 1=>'Approved'],$book->status, array('class' => 'form-select', 'placeholder' => 'Select Status')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Description:</strong>

                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"> {{ $book->description }} </textarea>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-left py-sm-3">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

</form>
</div>

@endsection