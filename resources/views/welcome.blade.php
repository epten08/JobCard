<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Card Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light text-dark">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">JobCardSys</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 mb-4">Welcome to JobCardSys</h1>
                <p class="lead">
                    Manage job cards efficiently, track progress, and streamline approvals. Built for teams that want clarity and control.
                </p>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-3">Get Started</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg mt-3 ms-2">Login</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg mt-3">Go to Dashboard</a>
                @endguest
            </div>
            <div class="col-md-6">
                <img src={{}} alt="Workflow" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </main>

    <footer class="bg-dark text-center text-white py-3 mt-auto">
        <div class="container">
            &copy; {{ date('Y') }} JobCardSys. All rights reserved.
        </div>
    </footer>

</body>
</html>
