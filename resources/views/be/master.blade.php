<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap, Font Awesome, Animate -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            background-color: #1f2d3d;
            color: #ffffff;
            min-height: 100vh;
        }
        .sidebar a {
            color: #c2c7d0;
        }
        .sidebar a:hover,
        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #ffffff;
            border-radius: 0.5rem;
        }
        .sidebar .nav-link i {
            width: 20px;
        }
    </style>
</head>
<body>

    @include('be.navbar')

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar p-3">
                @include('be.sidebar')
            </nav>

            <main class="col-md-10 ms-sm-auto px-4 py-4">
                @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm d-flex align-items-center" role="alert">
        <i class="fas fa-check-circle me-2 fs-5"></i>
        <div>{{ session('success') }}</div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
