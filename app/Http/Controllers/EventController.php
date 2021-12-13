<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index () {

        $search = request('search');

       if($search){
        $events = Event::where([
            ['title','like','%'.$search.'%']
        ])->get();
       }else{
        $events = Event::all();
       }

        return view('welcome',compact('events','search'));
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
            $user = auth()->user();

        $events = Event::create([
            'title' => $request->title,
            'discription' => $request->discription,
            'city' => $request->city,
            'private' => $request->private,
            'image' => $imageName,
            'items' => $request->items,
            'date' => $request->date,
            'user_id' => $user->id

        ]);
    }

        return redirect('/')->with('msg','Evento Salvo');
    }

    public function show($id) {

        $event = Event::findOrFail($id);


        $eventOwner = User::where('id', $event->user_id)->first()->toArray();


        return view('events.show',compact('event','eventOwner'));
    }
    public function dashboard(){

        $user = auth()->user();

        $events = $user->events;

        return view('events.dashboard',compact('events'));
    }
    public function destroy($id){

       Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg','Evento deletado com sucesso!!');
    }

    public function edit($id){

        $event = Event::findOrFail($id);

         return view('events.edit',compact('event'));
     }
     public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')).'.'.$extension;

            $data['image'] = $imageName;

            $request->image->move(public_path('img/events'),$imageName);
        Event::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg','Evento editado com sucesso!!');
        }
     }
}
