<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Create Section --}}
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-4xl mb-3">Tambah Catatan Anda</p>
                    <div class="divider"></div>
                    <form action="{{ route('note.store' , Auth::user()->id) }}" method="POST">
                        @csrf
                        <div class="flex justify-between items-center gap-3 flex-col">
                            <textarea name="note" class="textarea w-full max-w-4xl h-[120px] focus:outline-none focus:border-black" placeholder="Catatan Anda"></textarea>
                            <button type="submit" class="btn bg-black text-white self-center hover:bg-gray-800">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
