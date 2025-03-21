@extends("layouts.layout")
@section("title", "Admin felület")
@section('content')
    <h1>Admin Felület</h1>

    <h2>Felhasználók</h2>
    <ul>
        @foreach($users as $user)
            <li>{{ $user->user_name }} - {{ $user->email }}</li>
        @endforeach
    </ul>

    <h2>Szalonok</h2>
    <ul>
        @foreach($salons as $salon)
            <li>{{ $salon->salon_name }} - {{ $salon->location }}</li>
        @endforeach
    </ul>

    <h2>Események</h2>
    <ul>
        @foreach($events as $event)
            <li>{{ $event->title }} - {{ $event->location }}</li>
        @endforeach
    </ul>
@endsection