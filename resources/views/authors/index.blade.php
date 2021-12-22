@extends('layouts.app')


@section('content')

<div class="container">
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>
                Authors

                @can('author-create')

                <a class="btn btn-success btn-sm float-sm-end" href="{{ route('authors.create') }}"> Create New Author</a>

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

        <th>Name</th>

        <th width="280px">Action</th>

    </tr>

    @foreach ($authors as $author)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $author->name }}</td>

        <td>

            <form action="{{ route('authors.destroy',$author->id) }}" method="POST">

                <a class="btn btn-info btn-sm" href="{{ route('authors.show',$author->id) }}">Show</a>

                @can('author-edit')

                <a class="btn btn-primary btn-sm" href="{{ route('authors.edit',$author->id) }}">Edit</a>

                @endcan


                @csrf

                @method('DELETE')

                @can('author-delete')

                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?')">Delete</button>

                @endcan

            </form>

        </td>

    </tr>

    @endforeach

</table>
</div>

{!! $authors->links() !!}

@endsection