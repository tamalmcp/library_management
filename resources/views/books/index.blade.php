@extends('layouts.app')


@section('content')

<div class="container">
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>
                Books

                @can('book-create')

                <a class="btn btn-success btn-sm float-sm-end" href="{{ route('books.create') }}"> Create New Book</a>

                @endcan
            </h2>

        </div>

    </div>

</div>


@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif


<table class="table table-bordered">

    <tr>

        <th>No</th>

        <th>Title</th>

        <th width="280px">Action</th>

    </tr>

    @foreach ($books as $book)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $book->title }}</td>

        <td>

            <form action="{{ route('books.destroy',$book->id) }}" method="POST">

                @if(Auth::user()->hasRole('User') == true)
                <a class="btn btn-primary btn-sm" href="{{ route('requisition',$book->id) }}">Requisition</a>
                @endif

                <a class="btn btn-info btn-sm" href="{{ route('books.show',$book->id) }}">Show</a>

                @can('book-edit')

                <a class="btn btn-primary btn-sm" href="{{ route('books.edit',$book->id) }}">Edit</a>

                @endcan


                @csrf

                @method('DELETE')

                @can('book-delete')

                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?')">Delete</button>

                @endcan

            </form>

        </td>

    </tr>

    @endforeach

</table>
</div>

{!! $books->links() !!}

@endsection