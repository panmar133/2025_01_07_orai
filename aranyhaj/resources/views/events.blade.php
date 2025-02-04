@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Események")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<main>
    <h1>Események</h1>
    <p></p>     <!-- rövid leírás -->
    

<!-- PHP-s kilistázás -->
<div>
        <table>
            <tr>
                <th>#</th>
                <th>Esemény neve:</th>
                <th>Esemény helye:</th>
                <th>Eseményel kapcsolatos információk:</th>
                <th>Esemény kezdése:</th>
            </tr> 
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->information }}</td>
                        <td>{{ $event->starts_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
</main>
@endsection
<!-- Lezárás -->