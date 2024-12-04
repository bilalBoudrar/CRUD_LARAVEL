<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
@include('Partials.nav')

<body>
    <h1 class="text-center">Modifier un éléve</h1>
    <hr>
    
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('eleves.update', $eleve->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">Nom :</label>
                <input type="text" class="form-control" name="nom" value="{{ old('nom',$eleve->nom) }}">
            </div>
            <div class="mb-3">
                <label class="form-check-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" value="{{ old('prenom',$eleve->prenom) }}">
            </div>
            <div class="mb-3">
                <label class="form-check-label">Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email',$eleve->email) }}">
            </div>
            <div class="mb-3">
                <label class="form-check-label">Password</label>
                <input type="password" class="form-control" name="password" value="{{ old('password',$eleve->password) }}">
            </div>
            <div class="mb-3">
              <label class="form-check-label">Confirmatin de mot de pass</label>
              <input type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="mb-3">
                <label class="form-check-label">Inserer une image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a type="submit" href="{{ route('eleves.index') }}" class="btn btn-danger">Annuler</a>
        </form>
        <div>
</body>

</html>
