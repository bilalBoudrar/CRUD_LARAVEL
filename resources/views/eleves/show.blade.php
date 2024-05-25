<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('Partials.nav')
    <h1>Gestion des élèves</h1>
    <div class="container">
        <strong>ID élève</strong> : {{ $eleve->id}}  <br><br>
        <strong>Nom</strong> : {{ $eleve->nom}} <br><br>
        <strong>Prénom</strong> : {{ $eleve->prenom}} <br><br>
        <strong>ID club</strong> : {{ $eleve->id_club }} <br><br>
        
        <h1 class="text-center">Liste d'activité auxquelles l'élève a participé</h1>
        <table>
            <tr>
                <th>Id activité</th>
                <th>Description</th>
                <th>Date Début</th>
                <th>Nombre de Jours</th>
            </tr>
            @foreach($activites as $activite)
            
            <tr>
                <td>{{$activite->id}}</td>
                <td>{{$activite->description}}</td>
                <td>{{$activite->dateDebut}}</td>
                <td>{{$activite->nombreJours}}</td>
            </tr>
            
            @endforeach
        </table>
        <p>Nombre total des jours : {{ $totalJours }}</p>
    </div>
</body>
</html>