@extends("layouts.layout")
@section("title", "Szalontulajdonos felület")
@section('content')
<main id="salon-owner-page"> 
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card donation-card">
                    <div class="card-body text-center">
                        <h1 class="text-center my-4">Szalontulajdonos Felület</h1><hr>

                        <h4 class="text-center my-4">A Te Szalonjaid:</h4>
                        <div class="container">
                            <div class="row">
                                @foreach ($salons as $salon)
                                    <div class="col-12 col-md-6 col-lg-4 mb-4 salon-card">
                                        <div class="card h-100">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title">{{ $salon->salon_name }}</h5>
                                                <img id="image" src="{{ $salon->image_name }}" alt="Szalon Kép" class="img-fluid my-3">
                                                <p class="card-text">{{ $salon->short_information }}</p>
                                                <a id="button" href="{{ route('salons.show', $salon->id) }}" class="btn btn-dark">Továbbiak</a>
                                                <div class="mt-auto">
                                                    <p class="card-text">
                                                        <strong>Szalon helye:</strong> {{ $salon->location }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div><br><hr>

                        <br><button id="button" type="button" class="btn btn-dark" data-toggle="modal" data-target="#createEventModal">
                            Esemény létrehozása
                        </button><br><hr>

                        <h4>Szalonhoz tartozó események:</h4>
@foreach ($salons as $salon)
    <h5>{{ $salon->salon_name }} - Események:</h5>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            @forelse ($salon->events as $event)
                <div class="col-12 col-md-4 col-lg-4 mb-4 event-card">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">{{ $event->title }}</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <p class="mb-0"><strong>Időpont:</strong> {{ \Carbon\Carbon::parse($event->starts_at)->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>

                            <img src="{{ asset($event->image_name) }}" alt="Event Image" class="img-fluid rounded my-3">
                            <p class="text-center">{{ $event->short_information }}</p>
                            <div class="col-md-8 mb-1">
                                <p><strong>Helyszín:</strong>
                                <a class="copy-text" onclick="copyText(this)" id="copyLink"
                                    data-location="{{ $event->location }}">{{ $event->location }}
                                </a></p>   
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-dark btn-hover">Továbbiak</a>
                                <p class="card-text mb-0 ms-3">
                                    <strong>Résztvevők:</strong>
                                    <a href="">{{ $event->participants_count ?? 0 }}</a>
                                </p>
                                <p class="card-text mb-0 ms-3">
                                    <strong>Likok:</strong>
                                    <a href="">{{ $event->likes_count ?? 0}}</a>
                                </p>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button id="button" type="button" class="btn btn-dark" data-toggle="modal" data-target="#editEventModal{{ $event->id }}">Módosítás</button>
                            <a href="{{ route('owner.eventDetails', $event->id) }}" id="button" class="btn btn-dark">Részvételi adatok</a>
                            <!-- esemény törlés -->
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button id="button" type="submit" class="btn btn-dark">Törlés</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Esemény módosítás -->
                <div class="modal fade" id="editEventModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel{{ $event->id }}" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editEventModalLabel{{ $event->id }}">Esemény módosítása</h5>
                                <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('events.update', $event->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title">Esemény neve</label>
                                        <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="location">Helyszín</label>
                                        <input type="text" name="location" class="form-control" value="{{ $event->location }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="short_information">Rövid információ</label>
                                        <input type="text" name="short_information" class="form-control" value="{{ $event->short_information }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="information">Bővebb információ</label>
                                        <textarea name="information" class="form-control">{{ $event->information }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="image_name">Kép URL</label>
                                        <textarea name="image_name" class="form-control">{{ $event->image_name }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <img src="{{ asset($event->image_name) }}" class="event-image img-fluid" alt=" ">
                                    </div>

                                    <div class="form-group">
                                        <label for="starts_at">Esemény kezdete</label>
                                        <input type="datetime-local" name="starts_at" class="form-control" value="{{ \Carbon\Carbon::parse($event->starts_at)->format('Y-m-d\TH:i') }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="card-body">          
                                        <button id="button"  type="button" class="btn btn-btn-dark" data-dismiss="modal">Mégsem</button>
                                        <button id="button" type="submit" class="btn btn-btn-dark">Frissítés</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <h1>Nincsenek események.</h1>
            @endforelse
        </div>
    </div>
@endforeach
</div>
</main><br>
@endsection