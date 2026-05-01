<x-app-layout>
    <div class="max-w-md mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-8">
            <h1 class="text-2xl font-semibold text-gray-900 mb-6">Masuk ke Perpustakaan</h1>

            @if($errors->any())
                <div class="mb-4 rounded-lg bg-red-50 border border-red-200 p-4 text-sm text-red-700">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                </div>

                <div class="flex items-center justify-between mb-6">
                    <label class="inline-flex items-center text-sm text-gray-700">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" />
                        <span class="ml-2">Ingat saya</span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full rounded-md bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Login
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
