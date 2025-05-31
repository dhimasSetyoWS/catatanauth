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
                        <div class="flex justify-between align-middle">
                            <input name="note" placeholder="Catatan Anda" class="input input-bordered input-lg w-full max-w-lg focus:outline-none focus:border-black"></input>
                            <button type="submit" class="btn bg-black text-white self-center">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
