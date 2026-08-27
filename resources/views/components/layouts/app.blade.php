<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">

    <x-navbar />
    
    <main class="flex-grow-1">
        @if (session()->has('successMessage'))
            <div class="container mt-4">
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <strong>Ottimo!</strong> {{ session('successMessage') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        
        {{ $slot }}
    </main>

    <x-footer />

</body>

</html>
