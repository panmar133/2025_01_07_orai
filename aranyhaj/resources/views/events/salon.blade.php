@extends('layouts.layoutSearch')

@section('title', $salon->salon_name)

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset($salon->image_name) }}" class="img-fluid" alt="Szalon kép">
                        <h1 class="text-center">{{ $salon->salon_name }}</h1><hr><br>
                        <div class="text-center">
                            <p><strong>Helyszín:</strong> {{ $salon->city }} {{ $salon->street }} {{ $salon->zip_code }}</p>
                            <p><strong>Információ:</strong> {{ $salon->information }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><br>
@endsection
