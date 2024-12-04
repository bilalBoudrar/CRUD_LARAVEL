@include('Partials.nav')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-control {
            border-radius: 8px;
            box-shadow: none;
            height: 45px;
            padding: 10px;
            font-size: 1rem;
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

        .alert-success {
            border-radius: 8px;
        }

        .alert-danger {
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .container {
            max-width: 500px;
            margin-top: 50px;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        .text-danger {
            font-size: 0.9rem;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            text-align: center;
            margin-top: 116px; /* Reduced margin-top to move footer slightly up */
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-center mb-4">Login</h1>
        <form method="POST" action="{{ route('loginVerifier') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input name="email" type="text" class="form-control" id="email" value="{{ old('email') }}">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Include the Footer -->
    @include('Partials.footer')

</body>

</html>
