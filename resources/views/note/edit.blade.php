<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Catatan
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 h-screen">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-3/6">
                <div class="p-6 text-gray-900">
                    <p class="text-4xl mb-3">Ubah Catatan Anda</p>
                    <div class="divider"></div>
                    <form action="{{ route('note.update' , $note->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="flex justify-between items-center gap-3 flex-col">
                            <textarea name="note" class="textarea w-full max-w-4xl h-[120px] focus:outline-none focus:border-black">{{$note->note}}</textarea>
                            <button type="submit" class="btn bg-black text-white hover:bg-gray-800">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
