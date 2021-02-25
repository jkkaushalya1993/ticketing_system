<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Category;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() { $this->middleware('auth'); }
   
 
    
    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
        return view('tickets.user_tickets', compact('tickets'));
    }
    
    public function index()
    {
    
        $tickets = Ticket::paginate(10);
       // $tickets = Ticket::latest()->get();
        return view('tickets.index', compact('tickets'));
      #  return view('tickets.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addnew()
    {
        return view('tickets.addnew');
    }
    
    public function remove(Ticket $ticket)
    {
        return view('tickets.remove', compact('ticket'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'summary' => 'required',
            'details' => 'required'
        ]);
        
        Ticket::create([
            'summary'=>request('summary'),
            'details'=>request('details'),
            'status'=>request('status'),
            'user_id' => Auth::user()->id,
            'category_id' => 1,
            'ticket_id' => strtoupper(Str::random(10)),
            'priority' => $request->input('priority'),
        ]);
        
        
        return redirect()->route('tickets.userTickets');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function display(Ticket $ticket)
    {
        return view('tickets.display', compact('ticket'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)    
    {
        $request->validate([          
            'summary' => 'required',
            'details' => 'required'
        ]);
        
        $ticket->summary = request('summary');
        $ticket->details = request('details');
        $ticket->status = request('status');
        
        $ticket->save();
        
        return redirect()->route('tickets.userTickets');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index');
    }
}