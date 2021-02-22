<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function view()
    {
        $events = Event::all();
        return view('Backend.Event.index', ['data' => $events]);
    }

    public function add()
    {
        return view('Backend.Event.create');
    }

    public function create(Request $request)
    {
        $process = Event::create(['name' => $request->name]);

        if ($process) {
            return redirect(url('/dapur/acara'))->with('created','Data Berhasil Disimpan');
        } else {
            return back()->with('warning','Data Gagal Disimpan');
        }
    }
}
