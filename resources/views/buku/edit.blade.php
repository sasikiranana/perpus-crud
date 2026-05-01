<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Buku
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('buku.update', $buku) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Judul Buku</label>
                        <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}"
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Pengarang</label>
                        <input type="text" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}"
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                               min="1000" max="9999">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-1">Stok</label>
                        <input type="number" name="stok" value="{{ old('stok', $buku->stok) }}"
                               class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                               min="0">
                    </div>
                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                            Update
                        </button>
                        <a href="{{ route('buku.index') }}"
                           class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>