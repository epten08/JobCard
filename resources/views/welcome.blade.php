<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Job Card System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .hero-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="container d-flex flex-column justify-content-center align-items-center flex-grow-1">
        <div class="card hero-card p-5 mt-5 text-center">
            <h1 class="display-4 fw-bold mb-3">Welcome to JobCardSys</h1>
            <p class="lead mb-4">
                Simplify your job card management, streamline approvals, and gain clear insights with our easy-to-use system.
            </p>
            @guest
                {{-- <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 me-2 mb-2">Get Started</a> --}}
                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg px-4">Login</a>
            @else
                <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg px-4">Go to Dashboard</a>
            @endguest
        </div>
{{--
        <div class="mt-5 text-center">
            <img src="https://picsum.photos/200/300" alt="Task Management Illustration" class="img-fluid" style="max-height: 300px;">
        </div> --}}
    </div>

    <footer class="text-center py-3 text-muted small">
        &copy; {{ date('Y') }} JobCardSys — Empowering your workflow.
    </footer>

</body>
</html>
