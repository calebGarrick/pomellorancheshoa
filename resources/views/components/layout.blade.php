
<!DOCTYPE html>
<html lang="en" data-theme="autumn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Pomello Ranches Hoa' : 'Pomello Ranches Hoa' }}</title>
    <link rel="preconnect" href="<https://fonts.bunny.net>">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-base-200 font-sans">
    <nav class="navbar bg-base-100">
        <div class="navbar-start flex gap-2">
            <a href="/" class="btn btn-ghost text-xl">
                <img src="{{ Vite::asset('resources/images/logocolor220.png') }}" alt="Pomello Ranches HOA Logo" class="h-8 w-8 mr-2"/>
                Pomello Ranches HOA
            </a>
            <a class="btn {{ request()->routeIs('about') ? 'bg-secondary' : 'bg-accent' }}" href="{{ route('about') }}">About Us</a>
            <a class="btn {{ request()->routeIs('contact') ? 'bg-secondary' : 'bg-accent' }}" href="{{ route('contact') }}">Contact</a>
        </div>
        <div class="navbar-end gap-2">
            @auth
                <span class="text-sm">{{ auth()->user()->name }}</span>
                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button type="submit" class="btn btn btn-sm">Logout</button>
                </form>
            @else
                <a href="/login" class="btn btn btn-sm">Sign In</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Sign Up</a>
            @endauth
        </div>
    </nav>

    <main class="flex-1 container mx-auto px-4 py-8">
        {{ $slot }}
    </main>
    
    <!-- Success Toast -->
    @if (session('success'))
        <div class="toast toast-top toast-center">
            <div class="alert alert-success animate-fade-out">
                <svg xmlns="<http://www.w3.org/2000/svg>" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @elseif (session('error'))
        <div class="toast toast-top toast-center">
            <div class="alert alert-error animate-fade-out">
                <svg xmlns="<http://www.w3.org/2000/svg>" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif


    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
        <div>
            <p>Copyright &copy; Pomello Ranches HOA 2025.</p>
            <p>
                Information is furnished as accurate but is not warranted 
                and may be subject to errors or omissions. If you notice 
                any issues with this website, please use the contact form 
                to inform us.
            </p>
        </div>
    </footer>
</body>
</html>