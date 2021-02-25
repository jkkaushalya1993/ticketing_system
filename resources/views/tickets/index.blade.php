@extends('layouts.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tickets summary</h1>
    
    </div>

<div class="table-responsive">
        <a class="btn btn-dark" href="/tickets/addnew">New Ticket</a>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Ticket</th>
            <th>Summary</th>
            <th>Details</th>
            <th>Status</th>
          
          </tr>
        </thead>
        <tbody>
          @foreach ($tickets as $ticket)          
          <tr>
            <td>{{ $ticket->id }}</td>
            <td>{{ $ticket->summary }}</td>
            <td>{{ $ticket->details }}</td>
            <td>{{ $ticket->status }}</td>
            <td><a href="/tickets/{{$ticket->id}}" class="btn btn-secondary">Edit</a></td>
            <td><a href="/tickets/remove/{{$ticket->id}}" class="btn btn-warning">Remove</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>
@endsection