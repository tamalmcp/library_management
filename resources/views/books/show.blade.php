@extends('layouts.app')


@section('content')

<div class="container">
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>
                Show Book

                <a class="btn btn-primary btn-sm float-sm-end" href="{{ route('books.index') }}"> Back</a>
            </h2>

        </div>

    </div>

</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <td> {{ $book->title }} </td>
            </tr>
            <tr>
                <th>Description</th>
                <td> {{ $book->description }} </td>
            </tr>
            <tr>
                <th>Category</th>
                <td> {{ $book->category->title }} </td>
            </tr>
            <tr>
                <th>Author</th>
                <td> {{ $book->author->name }} </td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <?php
                    if($book->status == 0){
                        echo 'Unapproved';
                    }elseif($book->status == 1){
                        echo 'Approved';
                    }
                    ?>
                </td>
            </tr>
        </table>

    </div>

</div>

</div>

@endsection