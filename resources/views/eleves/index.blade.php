<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
@include('Partials.nav')
<body>
  <h1>La liste des éléves</h1>
  
  <div class="container">
    @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
    @endif
    
    <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name='search' width='30%'>
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <a href="{{ route('create') }}" type="button" class="btn btn-success"> Ajouter un élève </a>
    <table class="table">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Email</th>
              <th scope="col">Actions</th>
          </tr>
      </thead>
      <tbody>
          @foreach($eleves as $eleve)
          <tr>
              <th>{{ $eleve->id }}</th>
              <td>{{ $eleve->nom }}</td>
              <td>{{ $eleve->prenom }}</td>
              <td>{{ $eleve->email }}</td>
              <td>
                <a href="{{ route('show', $eleve->id ) }}" class="btn btn-primary">Afficher</a>
                <a href="{{ route('edit', $eleve->id ) }}" class="btn btn-info">Modiffier</a>
                <form action="{{ route('destroy', $eleve->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>  
    {{$eleves->links()}}
  </div>
</body>
</html>