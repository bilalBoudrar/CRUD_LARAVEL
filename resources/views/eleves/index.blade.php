<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La liste des élèves</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
</head>
<body>
    @include('Partials.nav')

    <div class="container my-4">
        <h1 class="text-center mb-4">La liste des élèves</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search Form -->
        <form class="d-flex mb-4" action="{{ route('search') }}">
            <input class="form-control me-2" type="search" placeholder="Search" name="search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <!-- Add Student Button -->
        <a href="{{ route('eleves.create') }}" class="btn btn-success mb-3">Ajouter un élève</a>

        <!-- Students Table -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
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
                        <th scope="row">{{ $eleve->id }}</th>
                        <td>{{ $eleve->nom }}</td>
                        <td>{{ $eleve->prenom }}</td>
                        <td>{{ $eleve->email }}</td>
                        <td>
                            <a href="{{ route('eleves.show', $eleve->id) }}" class="btn btn-primary btn-sm">Afficher</a>
                            <a href="{{ route('eleves.edit', $eleve->id) }}" class="btn btn-info btn-sm">Modifier</a>
                            <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élève ?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination (if needed) -->
        {{-- {{ $eleves->links() }} --}}
    </div>

    @include('Partials.footer')  <!-- Include the Footer -->
</body>
</html>
