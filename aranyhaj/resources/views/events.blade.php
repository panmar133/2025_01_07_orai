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
    <!--
        <table>
            <tr>
                <th>#</th>
                <th>Esemény neve:</th>
                <th>Esemény helye:</th>
                <th>Eseményel kapcsolatos információk:</th>
                <th>Esemény kezdése:</th>
            </tr> 
            <tbody>
                @foreach ($events as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->location }}</td>
                        <td>{{ $post->information }}</td>
                        <td>{{ $post->starts_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        -->
    </div>  
</main>
@endsection
<!-- Lezárás -->