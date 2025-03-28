@extends("layouts.layout")
@section("title", "Admin felület")
@section('content')
<main id="admin-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card donation-card">
                    <div class="card-body text-center">
                        <h1 class="text-center my-4">Admin Felület</h1><hr>
                        <!--Hiba üzenetek kezelése-->
                        @if(session('success'))
                            <div class="alert alert-success">
                            {{ session('success') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Felhasználók kiiratása -->
                        <h3>Felhasználók</h3><hr><br>
                        <div class="container">
                            <div class="row">
                                @foreach($users as $user)
                                    <div class="col-12 col-md-4 col-lg-4 mb-4 salon-card">
                                        <div class="card h-100 shadow">
                                            <div class="card-body d-flex flex-column">
                                                <img id="image" src="{{ $user->image_name }}" alt="Felhasználó Profilkép" class="img-fluid">
                                                <h4 class="card-title">{{ $user->user_name }}</h4>
                                                <p class="card-text">{{ $user->email }}</p>
                                                <p class="card-text">{{ $user->address }}</p>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between text-center">
                                                <button id="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#viewUserModal{{ $user->id }}">
                                                    Megtekintés</button>
                                                @if($user->admin != 2)
                                                    <button id="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#makeAdminModal{{ $user->id }}">
                                                        Admin jog</button>
                                                @else
                                                    <button id="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#removeAdminModal{{ $user->id }}">
                                                    Admin jog visszavonása</button>
                                                @endif
                                                <button id="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">Törlés</button>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Felhasználó admin adás -->
                                <div class="modal fade" id="makeAdminModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="makeAdminModalLabel{{ $user->id }}" aria-hidden="true" data-backdrop="false">
                                    <div class="modal-dialog userModalPosition" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="makeAdminModalLabel{{ $user->id }}">Felhasználó adminná tétele</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Bezárás">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.makeAdmin', $user->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <p>Biztosan adminná szeretnéd tenni <strong>{{ $user->name }}</strong> felhasználót?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Mégsem</button>
                                                    <button type="submit" class="btn btn-dark">Igen, admin lesz</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Admin jog visszavonás modal -->
                                <div class="modal fade" id="removeAdminModal{{ $user->id }}" tabindex="-1" role="dialog" data-backdrop="false">
                                    <div class="modal-dialog userModalPosition" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Admin jog visszavonása</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                Biztosan vissza szeretnéd vonni <strong>{{ $user->user_name }}</strong> admin jogát?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('admin.removeAdmin', $user->id) }}" method="POST">
                                                    @csrf
                                                    <button id="button" type="submit" class="btn btn-dark">Visszavonás</button>
                                                </form>
                                                <button id="button" type="button" class="btn btn-dark" data-dismiss="modal">Mégse</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- Felhasználó adatok megtekintése -->
                            <div class="modal fade" id="viewUserModal{{ $user->id }}" tabindex="-1" role="dialog" data-backdrop="false">
                                <div class="modal-dialog userModalPosition" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Felhasználó adatai</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Név:</strong> {{ $user->user_name }}</p>
                                            <p><strong>Email:</strong> {{ $user->email }}</p>
                                            <p><strong>Jogosultság:</strong> 
                                                @if ($user->admin == 2)
                                                    Admin
                                                @elseif ($user->admin == 1)
                                                    Szalontulajdonos
                                                @else
                                                    Felhasználó
                                                @endif
                                            </p>
                                            <p><strong>Létrehozva:</strong> {{ $user->created_at->format('Y-m-d H:i') }}</p>
                                            <p><strong>Utoljára frissítve:</strong> {{ $user->updated_at->format('Y-m-d H:i') }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="button" type="button" class="btn btn-dark" data-dismiss="modal">Bezárás</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel{{ $user->id }}" aria-hidden="true" data-backdrop="false">
                                <div class="modal-dialog userModalPosition" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteUserModalLabel{{ $user->id }}">Felhasználó törlése</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Bezárás">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Biztosan törölni szeretnéd <strong>{{ $user->name }}</strong> felhasználót?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-dark">Igen, törlöm</button>
                                            </form>
                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Mégse</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Szalon kiilistázása -->

<div class="container">
    <div class="row">
    <hr><h3>Szalonok</h3><br><hr>
        @foreach ($salons as $salon)
            <div class="col-12 col-md-6 col-lg-4 mb-4 salon-card">
                <div class="card h-100 shadow">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $salon->salon_name }}</h5>
                        <img id="postImage" src="{{ $salon->image_name }}" alt="Szalon Kép" class="img-fluid rounded my-3">
                        <p class="card-text">{{ $salon->short_information }}</p>
                        <a href="{{ route('salons.show', $salon->id) }}" class="btn btn-dark mb-2">Továbbiak</a>
                        <div class="mt-auto">
                            <p class="card-text"><strong>Szalon helye:</strong> {{ $salon->location }}</p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button id="button" class="btn btn-dark btn-sm mr-2" data-toggle="modal" data-target="#editSalonModal{{ $salon->id }}">Szerkesztés</button>
                        <button id="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#deleteSalonModal{{ $salon->id }}">Törlés</button>
                    </div>
                </div>
            </div>

                                    <!-- Szalon szerkesztése -->
                                    <div class="modal fade" id="editSalonModal{{ $salon->id }}" tabindex="-1" role="dialog" data-backdrop="false">
                                        <div class="modal-dialog salonModalPosition" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Szalon módosítása</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.updateSalon', $salon->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" name="salon_name" class="form-control" value="{{ $salon->salon_name }}" required>
                                                        <input type="text" name="location" class="form-control" value="{{ $salon->location }}" required>
                                                        <button id="button" type="submit" class="btn btn-dark mt-2">Mentés</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Szalon törlés -->
                                    <div class="modal fade" id="deleteSalonModal{{ $salon->id }}" tabindex="-1" role="dialog" data-backdrop="false">
                                        <div class="modal-dialog salonModalPosition" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Szalon törlése</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Biztosan törlöd a szalont?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('admin.deleteSalon', $salon->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button id="button" type="submit" class="btn btn-dark">Igen</button>
                                                    </form>
                                                        <button id="button" type="button" class="btn btn-dark" data-dismiss="modal">Mégse</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div><br>

                    <!-- Új szalon létrehozása -->
                    <div class="card-body text-center">
                        <button id="button"  class="btn btn-dark" data-toggle="modal" data-target="#createSalonModal">Új Szalon</button>
                    </div><br><hr>
                
                    <div class="modal fade" id="createSalonModal" tabindex="-1" role="dialog" data-backdrop="false">
                        <div class="modal-dialog salonCreateModalPosition" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Új Szalon létrehozása</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.createSalon') }}" method="POST">
                                    @csrf
                                    <input type="text" name="salon_name" class="form-control" placeholder="Szalon neve" required>
                                    <input type="text" name="image_name" class="form-control" placeholder="Kép URL">
                                    <input type="text" name="short_information" class="form-control" placeholder="Rövid leírás a szalonról" required>
                                    <input type="text" name="information" class="form-control" placeholder="Leírás a szalonról" required>
                                    <input type="text" name="location" class="form-control" placeholder="Helyszín" required>
                                        <select name="owner_id" class="form-control" required>
                                            <option value="">Válassz tulajdonost</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->user_name }}</option>
                                            @endforeach
                                        </select>
                                        <button id="button" type="submit" class="btn btn-dark mt-2">Létrehozás</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Esemény rész -->
                <h3>Események</h3><hr><br>

                <!-- Esemény létrehozás-->
                <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" data-backdrop="false">
                    <div class="modal-dialog eventModalPosition" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Új esemény létrehozása</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.createEvent') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Esemény neve</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="location">Helyszín</label>
                                        <input type="text" name="location" class="form-control" required>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="short_information">Rövid leírás</label>
                                        <input type="text" name="short_information" class="form-control" required>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="information">Részletes információ</label>
                                        <textarea name="information" class="form-control" required></textarea>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="image_name">Kép URL</label>
                                        <input type="text" name="image_name" class="form-control">
                                    </div>
                
                                    <div class="form-group">
                                        <label for="starts_at">Kezdés időpontja</label>
                                        <input type="datetime-local" name="starts_at" class="form-control" required>
                                    </div>
                
                                    <button type="submit" class="btn btn-dark mt-2">Létrehozás</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Események listázása -->
            <div class="container">
                <div class="row">
                    @foreach($events as $event)
                        <div class="col-12 col-md-4 col-lg-4 mb-4 event-card">
                            <div class="card h-100 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="card-title large">{{ $event->title }}</h5>
                                        </div>
                                        <div class="col-6 text-end">
                                            <p class="mb-0 small bold"><strong>Időpont:</strong> {{ \Carbon\Carbon::parse($event->starts_at)->format('Y-m-d H:i') }}</p>
                                        </div>
                                    </div>

                                    <img id="postImage" src="{{ asset($event->image_name) }}" alt="Event Image" class="img-fluid rounded my-3">
                                    <p class="text-center">{{ $event->short_information }}</p>
                                    <div class="col-md-8 mb-1">
                                        <p class="small"><strong class="text-center">Helyszín:</strong>{{ $event->location }}</p>   
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center small">
                                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-dark btn-hover">Továbbiak</a>
                                        <p class="card-text mb-0 ms-3">
                                            <strong>Résztvevők:</strong>
                                            {{ $event->participants_count ?? 0 }}
                                        </p>
                                        <p class="card-text mb-0 ms-3">
                                            <strong>Likok:</strong>
                                            {{ $event->likes_count ?? 0}}
                                        </p>
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                    <!-- Gombok közötti rés hozzáadása -->
                                    <button id="button" class="btn btn-dark btn-sm mr-2" data-toggle="modal" data-target="#editEventModal{{ $event->id }}">Szerkesztés</button>
                                    <button id="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#deleteEventModal{{ $event->id }}">Törlés</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
                    <div class="card-body text-center">
                        <button id="button" class="btn btn-dark" data-toggle="modal" data-target="#createEventModal">Új Esemény</button>
                    </div>
            <!-- Esemény Módosítása -->
            @foreach($events as $event)
            <div class="modal fade" id="editEventModal{{ $event->id }}" tabindex="-1" role="dialog" data-backdrop="false" data-keyboard="true">
                <!-- Modal párbeszédablak (szélesebbre állítva) -->
                <div class="modal-dialog  modal-lg " role="document">
                    <div class="modal-content" style="background-color: #ffffff;"> <!-- Fehér háttér a modalnak -->
                        <div class="modal-header">
                            <h5 class="modal-title">Esemény módosítása</h5>
                            <!-- X gomb a jobb oldalra igazítva -->
                            <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.updateEvent', $event->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group">
                                    <label for="title">Esemény neve</label>
                                    <input type="text" name="title" class="form-control w-100" value="{{ old('title', $event->title) }}" required autofocus> <!-- Autofocus -->
                                </div>
                                
                                <div class="form-group">
                                    <label for="location">Helyszín</label>
                                    <input type="text" name="location" class="form-control mt-2 w-100" value="{{ old('location', $event->location) }}">
                                </div>

                                <div class="form-group">
                                    <label for="short_information">Rövid leírás</label>
                                    <input type="text" name="short_information" class="form-control mt-2 w-100" value="{{ old('short_information', $event->short_information) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="date">Kezdés időpontja</label>
                                    <input type="datetime-local" name="starts_at" class="form-control mt-2 w-100" value="{{ old('starts_at', \Carbon\Carbon::parse($event->starts_at)->format('Y-m-d\TH:i')) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="information">Részletes információ</label>
                                    <textarea name="information" class="form-control mt-2 w-100" required>{{ old('information', $event->information) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="salon_id">Szalon</label>
                                    <select name="salon_id" class="form-control mt-2 w-100" required>
                                        @foreach($salons as $salon)
                                            <option value="{{ $salon->id }}" {{ $event->salon_id == $salon->id ? 'selected' : '' }}>
                                                {{ $salon->salon_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button id="button" type="submit" class="btn btn-dark mt-2 w-100">Mentés</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endforeach


<script>$('#editEventModal{{ $event->id }}').on('show.bs.modal', function () {
    // Modal a képernyő tetejére ugrik, és megfelelően középre kerül
    $('html, body').animate({ scrollTop: 1 }, 'fast');
});
</script>

            <!-- Esemény Törlés -->
            @foreach($events as $event)
                <div class="modal fade" id="deleteEventModal{{ $event->id }}" tabindex="-1" role="dialog" data-backdrop="false">
                    <div class="modal-dialog eventModalPosition" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Esemény törlése</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>Biztosan törlöd az eseményt?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('admin.deleteEvent', $event->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button id="button" type="submit" class="btn btn-dark">Igen</button>
                                </form>
                                <button id="button" type="button" class="btn btn-dark" data-dismiss="modal">Mégse</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach                
            </div>
        </div>
    </div>
</main><br>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection