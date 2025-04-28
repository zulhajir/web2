<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use App\Models\Event;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::with('event')->get(); // ambil donasi dan event-nya
        return view('volunteers.index', compact('volunteers'));
    }

    public function create()
    {
        $events = Event::all();  // Menambahkan data event untuk digunakan di view create
        return view('volunteers.create', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'event_id' => 'required|exists:events,id',
        ]);

        Volunteer::create($request->all());
        return redirect()->route('volunteers.index');
    }

    public function edit(Volunteer $volunteer)
    {
        $events = Event::all();  // Menambahkan data event untuk digunakan di view edit
        return view('volunteers.edit', compact('volunteer', 'events'));
    }

    public function update(Request $request, Volunteer $volunteer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'event_id' => 'required|exists:events,id',
        ]);

        $volunteer->update($request->all());
        return redirect()->route('volunteers.index');
    }

    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->route('volunteers.index');
    }
}
