@extends('layouts.main')


@section('summary', 'My Tickets')


@section('content')

<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket"> My Tickets</i>
                </div>
                <a class="btn btn-dark" href="/tickets/addnew">New Ticket</a>
                @if($tickets->isEmpty())
                        <p>You have not created any tickets yet.</p>
                         
                    @else
       
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
          @foreach($tickets as $ticket)          
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
  @endif
@endsection