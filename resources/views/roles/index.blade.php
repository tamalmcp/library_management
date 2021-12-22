@extends('layouts.app')


@section('content')

<div class="container">
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>
                Role Management

                @can('role-create')

                <a class="btn btn-success btn-sm float-sm-end" href="{{ route('roles.create') }}"> Create New Role</a>

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

    @foreach ($roles as $key => $role)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $role->name }}</td>

        <td>

            <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">Show</a>

            @can('role-edit')

            <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">Edit</a>

            @endcan

            @can('role-delete')

            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}

            {!! Form::close() !!}

            @endcan

        </td>

    </tr>

    @endforeach

</table>
</div>

{!! $roles->render() !!}

@endsection