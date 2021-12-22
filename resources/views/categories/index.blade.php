@extends('layouts.app')


@section('content')

<div class="container">
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>
                Categories

                @can('category-create')

                <a class="btn btn-success btn-sm float-sm-end" href="{{ route('categories.create') }}"> Create New Category</a>

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

    @foreach ($categories as $category)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $category->title }}</td>

        <td>

            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">

                <a class="btn btn-info btn-sm" href="{{ route('categories.show',$category->id) }}">Show</a>

                @can('category-edit')

                <a class="btn btn-primary btn-sm" href="{{ route('categories.edit',$category->id) }}">Edit</a>

                @endcan


                @csrf

                @method('DELETE')

                @can('category-delete')

                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?')">Delete</button>

                @endcan

            </form>

        </td>

    </tr>

    @endforeach

</table>
</div>

{!! $categories->links() !!}

@endsection