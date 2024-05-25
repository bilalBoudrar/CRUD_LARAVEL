<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
@include('Partials.nav')

<body>
    <h1 class="text-center">Modifier un éléve</h1>
    <hr>
  <div class="container">
    <form action="{{ route('update', $eleve->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
          <label class="form-label">Nom :</label>
          <input type="text" class="form-control" name="nom" value="{{$eleve->nom}}">
        </div>
        <div class="mb-3">
            <label class="form-check-label">Prénom</label>
            <input type="text" class="form-control" name="prenom" value="{{$eleve->prenom}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" href="{{ route('index') }}" class="btn btn-danger">Annuler</button>
      </form>
  <div>
</body>
</html>