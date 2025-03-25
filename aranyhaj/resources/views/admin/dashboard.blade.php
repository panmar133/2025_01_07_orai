@extends("layouts.layout")
@section("title", "Admin felület")
@section('content')
    <h1>Admin Felület</h1>
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
    <!-- felhasználók rész -->
    <h2>Felhasználók</h2>
    <ul>
    <h2>Felhasználók</h2>
    <ul>
        @foreach($users as $user)
            <li>
                {{ $user->user_name }} - {{ $user->email }}

                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewUserModal{{ $user->id }}">Megtekintés</button>

                @if($user->admin != 2)
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#makeAdminModal{{ $user->id }}">Admin jog</button>
                @else
                    <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#removeAdminModal{{ $user->id }}">Admin jog visszavonása</button>
                @endif

                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">Törlés</button>
            </li>

            <!-- felh. adatok megtekintése -->
            <div class="modal fade" id="viewUserModal{{ $user->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezárás</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- admin jog visszavonás -->
            <div class="modal fade" id="removeAdminModal{{ $user->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
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
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Visszavonás</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </ul>

    <!-- szalon létrehozás -->
    <h2>Szalonok</h2>
<ul>
    @foreach($salons as $salon)
        <li>
            {{ $salon->salon_name }} - {{ $salon->location }}
            
            <!-- szalon szerk., törlés gomb -->
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editSalonModal{{ $salon->id }}">Szerkesztés</button>
            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteSalonModal{{ $salon->id }}">Törlés</button>
        </li>

        <!-- szalon szerk. -->
        <div class="modal fade" id="editSalonModal{{ $salon->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
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
                            <button type="submit" class="btn btn-primary mt-2">Mentés</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- szalon törlés -->
        <div class="modal fade" id="deleteSalonModal{{ $salon->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
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
                            <button type="submit" class="btn btn-danger">Igen</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
</ul>

<button class="btn btn-success" data-toggle="modal" data-target="#createSalonModal">Új Szalon</button>

    <div class="modal fade" id="createSalonModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
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
                        <button type="submit" class="btn btn-primary mt-2">Létrehozás</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- esemény rész -->
    <h2>Események</h2>
<button class="btn btn-success" data-toggle="modal" data-target="#createEventModal">Új Esemény</button>

<!-- esemény létrehozás-->
<div class="modal fade" id="createEventModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
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
                        <input type="text" name="short_information" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="information">Részletes információ</label>
                        <textarea name="information" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image_name">Kép URL</label>
                        <input type="text" name="image_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="starts_at">Kezdés időpontja</label>
                        <input type="datetime-local" name="starts_at" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Létrehozás</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($events as $event)
    <li>
        {{ $event->title }} - {{ $event->location }}
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editEventModal{{ $event->id }}">Módosítás</button>
        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEventModal{{ $event->id }}">Törlés</button>
    </li>

    <!-- esemény mod. -->
    <div class="modal fade" id="editEventModal{{ $event->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Esemény módosítása</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.updateEvent', $event->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
                        <input type="text" name="location" class="form-control mt-2" value="{{ $event->location }}">
                        <input type="datetime-local" name="date" class="form-control mt-2" value="{{ $event->date }}" required>
                        <textarea name="description" class="form-control mt-2" required>{{ $event->description }}</textarea>
                        <select name="salon_id" class="form-control mt-2" required>
                            @foreach($salons as $salon)
                                <option value="{{ $salon->id }}" {{ $event->salon_id == $salon->id ? 'selected' : '' }}>{{ $salon->salon_name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary mt-2">Mentés</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- esemény törlés -->
    <div class="modal fade" id="deleteEventModal{{ $event->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
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
                        <button type="submit" class="btn btn-danger">Igen</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>
                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endforeach
@endsection