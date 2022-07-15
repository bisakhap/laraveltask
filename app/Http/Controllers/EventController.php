<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter') ?? NULL;

        $query = Event::query();
        if(!empty($filter)){
            $query->where('end_date','<=',now()->format('Y-m-d'));
        }
        $events = $query->orderBy('start_date','asc')->get();
        return view('events.index', compact('events'));
    }

    public function create(){
        $event = new Event();
        return view('events.create', compact('event'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|min:3',
            'description' => 'required',
            'start_date' => 'required|date|after:today|date_format:Y-m-d',
            'end_date' => 'required|date|after:start_date|date_format:Y-m-d',
        ]);
        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);
        return redirect()->route('events')->with('message','Successfully Created');
    }

    
    public function edit($id){
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|min:3',
            'description' => 'required',
            'start_date' => 'required|date|after:today|date_format:Y-m-d',
            'end_date' => 'required|date|after:start_date|date_format:Y-m-d',
        ]);
        
        Event::where('id', $id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);
        return redirect()->route('events')->with('message','Successfully Updated');
    }

    public function destroy($id){
        Event::where('id', $id)->delete();
        return response()->json([],204);
    }
}
