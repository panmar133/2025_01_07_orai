@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>{{ $event->title }} - Részletek</h1>

        <div class="mb-4">
            <p><strong>Helyszín:</strong> {{ $event->location }}</p>
            <p><strong>Időpont:</strong> {{ \Carbon\Carbon::parse($event->starts_at)->format('Y-m-d H:i') }}</p>
            <p><strong>Rövid információ:</strong> {{ $event->short_information }}</p>
            <p><strong>Teljes információ:</strong> {{ $event->information }}</p>
        </div>

        <h3>Résztvevők</h3>
        @if ($participants->isEmpty())
            <p>Nincsenek résztvevők.</p>
        @else
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Felhasználónév</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                @foreach($participants as $interaction)
                <td>{{ $interaction->user->user_name }}</td>
                @endforeach
                </tr>
            </tbody>
        </table>
        @endif

        <h3>Likek</h3>
        @if ($likes->isEmpty())
            <p>Nincsenek likek.</p>
        @else
            <table class="table">
            <thead>
                <tr>
                <th>Felhasználónév</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                @foreach($likes as $interaction)
                <td>{{ $interaction->user->user_name }}</td>
                @endforeach
                </tr>
            </tbody>
        </table>
        @endif
    </div>
@endsection