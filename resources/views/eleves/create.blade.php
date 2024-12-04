<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ajouter un Élève</title>
    <style>
        /* Custom styles for input fields */
        .form-control {
            border-radius: 8px; /* Round edges for input fields */
            box-shadow: none;
            height: 45px; /* Adjusted height for better spacing */
            padding: 10px;
            font-size: 1rem; /* Slightly larger text */
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-label {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .btn {
            border-radius: 20px;
            font-weight: 600;
            font-size: 1rem;
            padding: 10px 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .alert-danger ul {
            margin: 0;
        }

        .alert-danger {
            border-radius: 8px;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .card-body {
            padding: 2rem;
        }

        /* Flex layout for form */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .d-flex {
            display: flex;
            gap: 1rem;
            justify-content: space-between;
        }

        /* Adjusting the footer position */
        footer {
            margin-top: 50px; /* Moves footer down */
        }

        /* Error messages styling */
        .alert-danger {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    @include('Partials.nav')

    <div class="container">
        <h1 class="text-center mb-4">Ajouter un Élève</h1>
        <hr>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreur!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('eleves.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}">
            </div>

            <div class="form-group">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}">
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirmation du mot de passe :</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Insérer une image :</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="d-flex mt-4">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{ route('eleves.index') }}" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>

    <!-- Include the Footer Section -->
    @include('Partials.footer')

</body>

</html>
