<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détail de l'Élève</title>
    <!-- Assuming Bootstrap is already included in your system -->
    <link href="/path/to/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Custom styles for card and container */
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        .content {
            min-height: 80vh; /* Take most of the screen space */
            padding-bottom: 50px; /* Space for footer */
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
        }

        .card-img-top {
            border-radius: 10px;
        }

        /* Footer Styles */
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            margin-top: auto; /* This pushes the footer to the bottom */
            border-top: 1px solid #ddd;
            width: 100%;
            position: relative;
            bottom: 0;
        }

        footer p {
            margin: 0;
            color: #6c757d;
        }
    </style>
</head>
<body class="d-flex flex-column" style="height: 100vh;">

    @include('Partials.nav')

    <div class="container content">
        <h2>Détails de l'Élève</h2>

        <div class="d-flex justify-content-center align-items-center">
            <div class="card" style="width: 18rem;">
                <!-- Displaying the student image -->
                <img src="{{ asset('storage/'.$eleve->image)}}" class="card-img-top" alt="Élève Image">
                
                <div class="card-body">
                    <!-- Displaying student name, surname, and email -->
                    <h5 class="card-title">#{{ $eleve->id}} {{ $eleve->nom}}</h5>
                    <p class="card-text"><strong>Prénom:</strong> {{ $eleve->prenom }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $eleve->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the Footer Section -->
    @include('Partials.footer')

</body>
</html>
