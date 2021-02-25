@extends('layouts.main')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Ticket {{$ticket->id}}</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          This week
        </button>
      </div>
    </div>

    <form action="" method="post">
      {{ csrf_field()}}
      <div class="form-group">
        <label for="summary">Summary</label>
        <input type="text" id="summary" name="summary" class="form-control {{ $errors->has('summary') ? 'is-invalid':'' }}" value="{{ old('summary', $ticket->summary)}}"/>
     
      @if($errors->has('summary'))
      <span class = 'help-block'>
 		      <strong> {{$errors->first('summary') }}</strong>
      </span>
      @endif
     
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" id="details" name="details" class="form-control {{ $errors->has('details') ? 'is-invalid':'' }}" value="{{ old('details', $ticket->details)}}"/>
      
      @if($errors->has('details'))
      <span class = 'help-block'>
 		      <strong> {{$errors->first('details') }}</strong>
      </span>
      @endif
      
      </div>

      <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status" value="{{$ticket->status}}">
          <option value="Open" {{$ticket->status == "Open"?"selected":""}}>Open</option>
          <option value="In Progress" {{$ticket->status == "In Progress"?"selected":""}}>In Progress</option>
          <option value="Closed" {{$ticket->status == "Closed"?"selected":""}}>Closed</option>
        </select>
      </div>
          

          <button class="btn btn-dark" type="submit">Update</button>
          <a href="{{route('tickets.index')}}" class="btn btn-dark" type="submit">Back</a>
    </form>
    
    <div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://ticketsystem.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

  </main>
@endsection