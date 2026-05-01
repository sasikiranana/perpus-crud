<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Buku
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Message --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Data Buku Perpustakaan</h3>
                    <a href="{{ route('buku.create') }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        + Tambah Buku
                    </a>
                </div>

                <table class="w-full text-sm border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Judul</th>
                            <th class="border px-4 py-2">Pengarang</th>
                            <th class="border px-4 py-2">Tahun Terbit</th>
                            <th class="border px-4 py-2">Stok</th>
                            <th class="border px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($buku as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $item->judul }}</td>
                            <td class="border px-4 py-2">{{ $item->pengarang }}</td>
                            <td class="border px-4 py-2">{{ $item->tahun_terbit }}</td>
                            <td class="border px-4 py-2">{{ $item->stok }}</td>
                            <td class="border px-4 py-2 text-center space-x-1">
                                <a href="{{ route('buku.edit', $item) }}"
                                   class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 text-xs">
                                    Edit
                                </a>
                                <form action="{{ route('buku.destroy', $item) }}" method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="border px-4 py-4 text-center text-gray-500">
                                Belum ada data buku.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $buku->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>