<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'showEvent']]);
    }
    public function index()
    {
        $events = Event::all();
        return view('pages.home', compact('events'));
    }

    public function addEvent()
    {
        return view('pages.add-event');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'place' => 'required|max:255',
            'organizer' => 'required|max:255',
            'starts' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif'
        ]);
//dd($request->all());
        if (request()->hasFile('logo')) {
            $path = $request->file('logo')->store('public/images');
            $fileName = str_replace('public/images/', '', $path);
        }


        Event::create([
            'name' => request('name'),
            'place' => request('place'),
            'organizer' => request('organizer'),
            'phone' => request('phone'),
            'starts' => request('starts'),
            'ends' => request('ends'),
            'description' => request('description'),
            'logo' => request('logo'),
            'user_id' => Auth::id()
        ]);
        return redirect('/');
    }

    public function showEvent(Event $event){
        return view('pages.event', compact('event'));
    }

    public function deleteEvent(Event $event){
        $event->delete();
        return redirect('/');
    }

    public function updateEvent(Event $event)

    {
        if (Gate::denies('edit-event', $event)) {

            dd('Tu neturi teisės atlikti šį veiksmą');

        }
        return view('pages.update-event', compact('event'));
    }

    public function storeUpdate(Event $event, Request $request)
    {
        Event::where('id', $event->id)->update($request->only(['name', 'place', 'organizer', 'phone', 'starts', 'ends', 'description', 'logo']));
        return redirect('/event/'.$event->id);
    }

}
