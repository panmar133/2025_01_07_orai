@extends('layouts.layout')

@section('title', 'Részt vett események')

@section('content')
    <h1>Részt vett események</h1>
    <ul>
        @foreach($events as $event)
            <li>Esemény címe: {{ $event->event->title }} Kezdés időpontja: {{ $event->event->starts_at }}; Helyszín: {{ $event->event->location }}</li> <!-- Az esemény neve -->
        @endforeach
    </ul>
@endsection