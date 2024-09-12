<x-app-layout title="Kategori Pemilihan">
    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>


    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-[265px]">

        <div class="mb-5">
            <x-toast.success session="successAddedCandidate" />
            <x-toast.danger session="failedAddElection" />

            <x-toast.success session="electionUpdatedSuccess" />
            <x-toast.warning session="failedAddElection" />

            <x-toast.success session="deletedElectionSuccess" />
            <x-toast.danger session="deleteElectionFailed" />
        </div>

        <div class="max-w-screen-xl">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                <div
                    class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 "
                                    placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                    <div
                        class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                        <a href="{{ route('dashboard.elections.create') }}"
                            class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary hover:bg-hover focus:ring-4 focus:ring-primary-300 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Tambah Kategori
                        </a>
                        <div class="flex items-center w-full space-x-3 md:w-auto">
                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200"
                                type="button">
                                <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                                Actions
                            </button>
                            <div id="actionsDropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44">
                                <ul class="py-1 text-sm text-gray-700 " aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Mass
                                            Edit</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Delete
                                        all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-4 py-3">Judul</th>
                                <th scope="col" class="px-4 py-3">Tanggal Dimulai</th>
                                <th scope="col" class="px-4 py-3">Tanggal Berakhir</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($elections as $election)
                                <tr class="border-b">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                        {{ $election->title }}
                                    </th>
                                    <td class="px-4 py-3">
                                        {{ $election->start_date->format('H.i - j M Y') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $election->end_date->format('H.i - j M Y') }}
                                    </td>
                                    <td class="px-4 py-3">{{ $election->status }}</td>
                                    <td class="flex px-4 py-3">
                                        <x-button.show :route="'dashboard.elections.show'" :params="$election->slug" />
                                        <x-button.edit :route="'dashboard.elections.edit'" :params="$election->slug" />

                                        <form action="{{ route('dashboard.elections.destroy', $election->slug) }}"
                                            method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <x-button.delete
                                                description="Apakah Anda yakin ingin menghapus kategori pemilihan?" />
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <tr class="border-b">
                                    <td colspan="4" class="px-4 py-3 text-center">
                                        Belum ada kategori yang ditambahkan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
