@include('Partials.nav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
      @session('success')
          <div class="alert alert-success">{{ session('success') }}</div>
      @endsession
        <form method="POST" action="{{ route('loginVerifier') }}"> 
          @csrf
            <div class="mb-3">
              <label class="form-label">Email :</label>
              <input name="email" type="text" class="form-control" value="{{ old('email') }}">
              <span class="text-danger">
                @error('email')
                  {{ $message }}
                @enderror
              </span>
            </div>
            <div class="mb-3">
              <label class="form-label">Password :</label>
              <input name="password" type="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</body>
</html>
