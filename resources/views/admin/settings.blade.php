@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Paramètres du Profil</h4>
            </div>

            <div class="card-body">
                <!-- Afficher les messages de succès -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Afficher les erreurs de validation -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulaire pour mettre à jour les informations de l'admin -->
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="profile_photo">Photo de profil :</label>
                        <input type="file" name="profile_photo" class="form-control-file">
                        @if ($admin->profile_photo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $admin->profile_photo) }}" alt="Photo de profil"
                                    width="100">
                            </div>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Nom :</label>
                        <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email :</label>
                        <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </form>

                <hr>

                <!-- Formulaire pour mettre à jour le mot de passe -->
                <h5 class="mt-4">Changer le mot de passe</h5>
                <form action="{{ route('admin.settings.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="current_password">Mot de passe actuel :</label>
                        <input type="password" name="current_password" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="new_password">Nouveau mot de passe :</label>
                        <input type="password" name="new_password" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="new_password_confirmation">Confirmer le nouveau mot de passe :</label>
                        <input type="password" name="new_password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-warning">Changer le mot de passe</button>
                </form>
            </div>
        </div>
    </div>
@endsection
