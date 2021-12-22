@extends('layouts.app')


@section('content')

<div class="container">
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>
                Show Role

                <a class="btn btn-primary btn-sm float-sm-end" href="{{ route('roles.index') }}"> Back</a>
            </h2>

        </div>

    </div>

</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td> {{ $role->name }} </td>
            </tr>
            <tr>
                <th>Permissions</th>
                <td>
                    @if(!empty($rolePermissions))

                        @foreach($rolePermissions as $v)

                            <label class="btn btn-secondary btn-sm disabled my-sm-1">{{ $v->name }},</label>

                        @endforeach

                    @endif
                </td>
            </tr>
        </table>

    </div>

</div>
</div>

@endsection