@extends("layouts.layout")

@section('content')
    <h1>Szalontulajdonos Felület</h1>

    <h2>A Te Szalonjaid</h2>
    <ul>
        @foreach($salons as $salon)
            <li>{{ $salon->salon_name }} - {{ $salon->location }}</li>
        @endforeach
    </ul>
@endsection