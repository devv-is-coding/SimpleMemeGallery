<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meme App')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Navigation -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-600">🖼 Meme App</a>
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium transition">Dashboard</a>
                <a href="{{ route('createMeme') }}" class="text-gray-700 hover:text-blue-600 font-medium transition">Upload</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-600 font-medium transition">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t py-4 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Meme App. All rights reserved.
    </footer>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
