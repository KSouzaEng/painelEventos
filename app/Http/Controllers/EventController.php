<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index () {

        $events = Event::all();

        return view('welcome',compact('events'));
    }
    public function create(){

        return view('events.create');
    }
    public function store(Request $request){

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')).'.'.$extension;

            $request->image->move(public_path('img/events'),$imageName);

        $events = Event::create([
            'title' => $request->title,
            'discription' => $request->discription,
            'city' => $request->city,
            'private' => $request->private,
            'image' => $imageName

        ]);
    }

        return redirect('/')->with('msg','Evento Salvo');
    }
}
