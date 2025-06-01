<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex gap-3 items-center justify-between">
                <p>
                    {{ __('Dashboard') }}
                </p>
                <a href="{{ route('note.create') }}" class="btn">Buat Catatan Baru</a>
            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @session('created')
                        <div role="alert" class="alert bg-green-600 text-white font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>{{ $value }}</span>
                        </div>
                    @endsession
                    @session('updated')
                        @if ($value == 'similar')
                            <div role="alert" class="alert alert-warning font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <span>Sorry bro, lu ga ngubah apapun</span>
                            </div>
                        @else
                            <div role="alert" class="alert alert-success font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $value }}</span>
                            </div>
                        @endif
                    @endsession
                    @session('deleted')
                        <div role="alert" class="alert bg-red-600 text-white font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>{{ $value }}</span>
                        </div>
                    @endsession
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Note</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row note -->
                                @forelse ($notes as $item)
                                    <tr class="hover:bg-base-300">
                                        <th>{{ $loop->iteration }}</th>
                                        <td class="max-w-sm">
                                            <a class="font-bold hover:underline"
                                                href="{{ route('note.show', $item->id) }}">
                                                {{ Str::limit($item->note, 150) }}
                                            </a>
                                        </td>
                                        <td class="text-end">
                                            <div class="flex justify-end gap-3 flex-col lg:flex-row">
                                                <a href="{{ route('note.edit', $item->id) }}" class="btn">Edit</a>
                                                <form action="{{ route('note.destroy', $item->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn bg-red-500 text-white hover:bg-red-700">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            <div class="flex justify-between items-center">
                                                <p>Anda belum mempunyai catatan</p>
                                            </div>
                                        </td>
                                        <td>-</td>
                                        <td class="flex justify-end">
                                            <a href="{{ route('note.create') }}" class="btn">Buat Catatan Baru</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
