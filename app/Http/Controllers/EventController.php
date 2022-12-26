<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Events';
        $events = Event::all();

        return view('events.index',[
            'title' => $title,
            'events' => $events
        ]);
    }

    public function create()
    {
        $title = 'Add Event';

        return view('events.create',[
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {

    }
}
