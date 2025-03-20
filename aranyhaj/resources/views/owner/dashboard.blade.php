@extends("layouts.layout")

@section('content')
<body>
    
    <h1>Szalontulajdonos Felület</h1>

    <h2>A Te Szalonjaid</h2>
    <ul>
        @foreach($salons as $salon)
            <li>{{ $salon->salon_name }} - {{ $salon->location }}</li>
        @endforeach
    </ul>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createEventModal">
        Esemény létrehozása
    </button>

    <h3>Szalonhoz tartozó események:</h3>
    @foreach ($salons as $salon)
        <h4>{{ $salon->salon_name }} - Események:</h4>
        <ul>
            @foreach ($salon->events as $event)
                <li>
                    <strong>{{ $event->title }}</strong> - {{ $event->starts_at }}
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editEventModal{{ $event->id }}">Módosítás</button>

                    <!-- esemény törlés -->
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Törlés</button>
                    </form>
                </li>

                <!-- Esemény módosítás -->
                <div class="modal fade" id="editEventModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel{{ $event->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editEventModalLabel{{ $event->id }}">Esemény módosítása</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                        <label for="starts_at">Esemény kezdete</label>
                                        <input type="datetime-local" name="starts_at" class="form-control" value="{{ \Carbon\Carbon::parse($event->starts_at)->format('Y-m-d\TH:i') }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégsem</button>
                                    <button type="submit" class="btn btn-primary">Frissítés</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    @endforeach

    <!-- Új esemény -->
    <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="createEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createEventModalLabel">Új esemény létrehozása</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('events.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Esemény neve</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="location">Helyszín</label>
                            <input type="text" name="location" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="short_information">Rövid információ</label>
                            <input type="text" name="short_information" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="information">Bővebb információ</label>
                            <textarea name="information" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image_name">Kép URL</label>
                            <textarea name="image_name" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="starts_at">Esemény kezdete</label>
                            <input type="datetime-local" name="starts_at" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="salon_id">Szalon</label>
                            <select name="salon_id" class="form-control" required>
                                @foreach ($salons as $salon)
                                    <option value="{{ $salon->id }}">{{ $salon->salon_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégsem</button>
                        <button type="submit" class="btn btn-primary">Esemény létrehozása</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
@endsection