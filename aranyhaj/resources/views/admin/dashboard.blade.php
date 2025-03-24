@extends("layouts.layout")
@section("title", "Admin felület")
@section('content')
    <h1>Admin Felület</h1>

    <!-- felhasználók rész -->
    <h2>Felhasználók</h2>
    <ul>
    <h2>Felhasználók</h2>
    <ul>
        @foreach($users as $user)
            <li>
                {{ $user->user_name }} - {{ $user->email }}

                <!-- Megtekintés gomb -->
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewUserModal{{ $user->id }}">Megtekintés</button>

                <!-- Admin jog adása -->
                @if($user->admin != 2)
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#makeAdminModal{{ $user->id }}">Admin jog</button>
                @else
                    <!-- Admin jog visszavonása -->
                    <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#removeAdminModal{{ $user->id }}">Admin jog visszavonása</button>
                @endif

                <!-- Felhasználó törlése -->
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">Törlés</button>
            </li>

            <!-- FELHASZNÁLÓ ADATAINAK MEGTEKINTÉSE (MODAL) -->
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

            <!-- ADMIN JOG VISSZAVONÁSA (MODAL) -->
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
    <button class="btn btn-success" data-toggle="modal" data-target="#createSalonModal">Új Szalon</button>

    <div class="modal fade" id="createSalonModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Új Szalon</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.createSalon') }}" method="POST">
                        @csrf
                        <input type="text" name="salon_name" class="form-control" placeholder="Szalon neve" required>
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

    @foreach($events as $event)
        <li>
            {{ $event->title }} - {{ $event->location }}
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editEventModal{{ $event->id }}">Módosítás</button>
            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEventModal{{ $event->id }}">Törlés</button>
        </li>

        <!-- esemény szerkesztés -->
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
                            <input type="text" name="location" class="form-control" value="{{ $event->location }}">
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