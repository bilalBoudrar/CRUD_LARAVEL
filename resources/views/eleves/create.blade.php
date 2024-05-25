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
    <h1 class="text-center">ajouter un éléve</h1>
    <hr>
    <div class="container">
      @if($errors->any())
        <div class="alert alert-danger">
          <strong>Errors:</strong>
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach 
          </ul>
        </div>
      @endif
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <input type="text" class="form-control" style="display: none;" name="id_eleve" >
        </div>
        <div class="mb-3">
          <label class="form-label">Nom :</label>
          <input type="text" class="form-control" value="{{ old('nom') }}" name="nom">
                
        </div>
        <div class="mb-3">
            <label class="form-check-label">Prénom</label>
            <input type="text" class="form-control" value="{{ old('prenom') }}" name="prenom">
           
        </div>
        <div class="mb-3">
          <label class="form-check-label">Email</label>
          <input type="text" class="form-control" value="{{ old('email') }}" name="email">
         
      </div>
      <div class="mb-3">
        <label class="form-check-label">password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="mb-3">
      <label class="form-check-label">Confirmatin de mot de pass</label>
      <input type="password" class="form-control" name="password_confirmation">
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="submit" href="{{ route('index') }}" class="btn btn-danger">Annuler</a>
      </form>
  <div>

</body>
</html>