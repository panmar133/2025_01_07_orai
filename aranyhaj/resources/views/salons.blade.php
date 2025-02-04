@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Szalonok")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<main>
    <h1>Szalonok</h1>
    <p></p>     <!-- rövid leírás -->
    

<!-- PHP-s kilistázás --> 
    <div>
        <table>
            <tr>
                <th>#</th>
                <th>Szalon neve</th>
                <th>Szalon elérhetősége</th>
            </tr>
            <tbody>
                @foreach ($salons as $salon)
                    <tr>
                        <td>{{ $salon->id }}</td>
                        <td>{{ $salon->salon_name }}</td>
                        <td>{{ $salon->zip_code }} {{ $salon->city }}, {{ $salon->street }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
</main>

@endsection
<!-- Lezárás -->