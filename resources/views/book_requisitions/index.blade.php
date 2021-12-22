@extends('layouts.app')


@section('content')

<div class="container">
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Book Requisitions</h2>

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

        <th>Book</th>
        <th>User</th>
        <th>Requisition Date</th>
        <th>Status</th>

        <th width="280px">Action</th>

    </tr>

    @foreach ($book_requisitions as $book_requisition)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $book_requisition->book->title }}</td>
        <td>{{ $book_requisition->user->name }}</td>
        <td>{{ $book_requisition->requisition_date }}</td>

        <td>
            @if ($book_requisition->status == 0)
            <span class="btn btn-secondary btn-sm disabled">New Request</span>
            @elseif($book_requisition->status == 1)
            <span class="btn btn-success btn-sm disabled">Approved</span>
            @elseif($book_requisition->status == 2)
            <span class="btn btn-primary btn-sm disabled">Returned</span>
            @endif
        </td>

        <td>
            @if ($book_requisition->status == 0)
            <a class="btn btn-info btn-sm" href="{{ route('approve_requisition',$book_requisition->id) }}">Approve</a>
            @elseif($book_requisition->status == 1)
            <a class="btn btn-dark btn-sm" href="{{ route('get_returned',$book_requisition->id) }}">Get Returned</a>
            @endif
        </td>

    </tr>

    @endforeach

</table>
</div>

{!! $book_requisitions->links() !!}

@endsection