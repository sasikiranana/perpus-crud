<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    @auth
        @include('components.sidebar')
        <div class="md:pl-64 min-h-screen">
            <nav class="bg-white shadow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        <div class="flex-shrink-0">
                            <a href="{{ route('buku.index') }}" class="text-xl font-bold text-blue-600">
                                Perpustakaan
                            </a>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-600">Halo, {{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="rounded-md bg-red-500 px-3 py-2 text-sm text-white hover:bg-red-600">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="p-6">
                {{ $slot }}
            </main>

            <footer class="bg-white shadow mt-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center text-gray-600 text-sm">
                    &copy; 2026 Sasikirana All rights reserved.
                </div>
            </footer>
        </div>
    @else
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex-shrink-0">
                        <a href="{{ route('buku.index') }}" class="text-xl font-bold text-blue-600">
                            Perpustakaan
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="rounded-md bg-blue-600 px-3 py-2 text-sm text-white hover:bg-blue-700">
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <main class="p-6">
            {{ $slot }}
        </main>

        <footer class="bg-white shadow mt-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center text-gray-600 text-sm">
                &copy; 2026 Sasikirana All rights reserved.
            </div>
        </footer>
    @endauth
</body>
</html>
