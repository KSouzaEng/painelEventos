@extends('layouts.main')

@section('title', $event['title'])

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{ $event['image'] }}" class="img-fluid" >
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $event->title }}</h1>
            <p class="event-city"><i class="icon ion-md-pin"></i> {{ $event['city']}}</p>
            <p class="events-participantes"><i class="icon ion-md-people"></i> X Participantes</p>
            <p class="event-owner mb-3" ><i class="icon ion-md-star"></i>{{ $eventOwner['name'] }}</p>
            <a href="#" class="col-md-12 btn btn-primary" id="description-container"> Confirmar Presença</a>
            <h3 class="mt-3">O evento conta com</h3>
            <ul id="items-list">
                @foreach ($event->items as $item )
                <li><i class="icon ion-md-play"></i>{{ $item }}</li>
                @endforeach
            </ul>
            <div class="col-md-12 mt-3">
                <h3>Sobre o Evento</h3>
                <p>{{ $event->discription }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
