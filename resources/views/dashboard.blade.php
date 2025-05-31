<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($notes as $item)
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
                                    <tr class="hover:bg-base-300">
                                        <th>{{$loop->iteration}}</th>
                                        <td>
                                            <a href="{{route('note.show' , $item->id)}}">
                                                {{$item->note}}
                                            </a>
                                        </td>
                                        <td class="text-end">
                                            <div class="btn">Edit</div>
                                            <div class="btn bg-red-500 text-white">Delete</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @empty
                        <div class="flex justify-between">
                            <div class="self-center">Anda belum mempunyai catatan</div>
                            <a href="{{ route('note.create') }}" class="btn">Buat Catatan Baru</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
