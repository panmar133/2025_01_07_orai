@extends('layouts.layout')

@section('title', 'Részt vett események')

@section('content')
    <h1>Részt vett események</h1>
    <ul>
        @foreach($events as $event)
            <li>{{ $event->event->name }}</li> <!-- Az esemény neve -->
        @endforeach
    </ul>
@endsection

