@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>
                Show User

                <a class="btn btn-primary btn-sm float-sm-end" href="{{ route('users.index') }}"> Back</a>
            </h2>

        </div>

    </div>

</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td> {{ $user->name }} </td>
            </tr>
            <tr>
                <th>Email</th>
                <td> {{ $user->email }} </td>
            </tr>
            <tr>
                <th>Roles</th>
                <td>
                    @if(!empty($user->getRoleNames()))

                    @foreach($user->getRoleNames() as $v)

                    <label class="btn btn-secondary btn-sm disabled">{{ $v }}</label>

                    @endforeach

                    @endif
                </td>
            </tr>
        </table>

    </div>

</div>
</div>

@endsection