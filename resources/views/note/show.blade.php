<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight p-12">
            Catatan {{ Auth::user()->name }}
        </h2>
        <hr>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between">
                            <p>{{ $note->note }}</p>
                            <div class="flex justify-end gap-3 flex-col lg:flex-row">
                                <a href="{{ route('note.edit', $note->id) }}" class="btn">Edit</a>
                                <div class="btn bg-red-500 text-white">Delete</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
