<x-app-layout title="Pemilihan">

    <x-slot:header>
        @include('components.front.navbar')
    </x-slot:header>

    <section class="px-4 pt-20 pb-80 md:px-8">
        {{-- <div>
            <h2 class="py-5 text-2xl font-bold text-center md:text-3xl">
                Pemilihan Ketua Osis dan Wakil Ketua Osis SMK Negeri 2 Tebing Tinggi
            </h2>
            <div class="flex flex-wrap justify-center gap-y-72 gap-x-24">
                <div class="w-4/5 pt-4 bg-center bg-cover rounded-lg shadow-lg md:w-72 h-72"
                    style="background-image: url({{ asset('img/merah-putih.jpg') }})">
                    <h3
                        class="flex items-center justify-center w-10 h-10 mx-auto text-2xl font-bold text-center text-white bg-orange-500 border-4 rounded-full">
                        1
                    </h3>

                    <img src="{{ asset('img/example.png') }}" alt="" class="object-cover w-full aspect-square">

                    <div class="pt-2 pb-5 bg-white rounded-b-lg shadow-md">
                        <div class="text-center">
                            <h5 class="font-bold">Prabowo Subianto</h5>
                            <span class="block -mt-1 text-sm">Calon Ketua Osis</span>
                        </div>

                        <div class="text-center">
                            <h5 class="font-bold">Gibran Rakabuming Raka</h5>
                            <span class="block -mt-1 text-sm">Calon Wakil Ketua Osis</span>
                        </div>

                        <div class="flex flex-col items-center justify-center mt-3">
                            <strong class="text-lg">432</strong>
                            <p class="text-sm text-gray-600">Total Suara</p>
                        </div>


                        <div class="flex justify-center mt-5 gap-x-2">
                            <a href=""
                                class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white rounded-lg bg-primary gap-x-1 hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Detail
                            </a>

                            <!-- Modal toggle -->
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="block px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300"
                                type="button">
                                Pilih
                            </button>

                            <!-- Main modal -->
                            <div id="default-modal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-2xl max-h-full p-4">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                                            <h3 class="text-xl font-semibold text-gray-900">
                                                Lanjut Memilih?
                                            </h3>
                                            <button type="button"
                                                class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto"
                                                data-modal-hide="default-modal">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 space-y-4 md:p-5">
                                            <p class="text-base leading-relaxed text-gray-500">
                                                Apakah Anda yakin ingin lanjut memilih kandidat ini? Anda tidak bisa
                                                memilih kandidat lain setelah anda mengklik "Yakin" untuk pesan ini
                                            </p>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5">
                                            <button data-modal-hide="default-modal" type="button"
                                                class="text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Yakin
                                            </button>
                                            <button data-modal-hide="default-modal" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="w-4/5 pt-4 bg-center bg-cover rounded-lg shadow-lg md:w-72 h-72"
                    style="background-image: url({{ asset('img/merah-putih.jpg') }})">
                    <h3
                        class="flex items-center justify-center w-10 h-10 mx-auto text-2xl font-bold text-center text-white bg-orange-500 border-4 rounded-full">
                        2
                    </h3>

                    <img src="{{ asset('img/example.png') }}" alt="" class="object-cover w-full aspect-square">

                    <div class="pt-2 pb-5 bg-white rounded-b-lg shadow-md">
                        <div class="text-center">
                            <h5 class="font-bold">Prabowo Subianto</h5>
                            <span class="block -mt-1 text-sm">Calon Ketua Osis</span>
                        </div>

                        <div class="text-center">
                            <h5 class="font-bold">Gibran Rakabuming Raka</h5>
                            <span class="block -mt-1 text-sm">Calon Wakil Ketua Osis</span>
                        </div>

                        <div class="flex flex-col items-center justify-center mt-3">
                            <strong class="text-lg">432</strong>
                            <p class="text-sm text-gray-600">Total Suara</p>
                        </div>


                        <div class="flex justify-center mt-5 gap-x-2">
                            <a href=""
                                class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white rounded-lg bg-primary gap-x-1 hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Detail
                            </a>

                            <!-- Modal toggle -->
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="block px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300"
                                type="button">
                                Pilih
                            </button>

                            <!-- Main modal -->
                            <div id="default-modal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-2xl max-h-full p-4">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                                            <h3 class="text-xl font-semibold text-gray-900">
                                                Lanjut Memilih?
                                            </h3>
                                            <button type="button"
                                                class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto"
                                                data-modal-hide="default-modal">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 space-y-4 md:p-5">
                                            <p class="text-base leading-relaxed text-gray-500">
                                                Apakah Anda yakin ingin lanjut memilih kandidat ini? Anda tidak bisa
                                                memilih kandidat lain setelah anda mengklik "Yakin" untuk pesan ini
                                            </p>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5">
                                            <button data-modal-hide="default-modal" type="button"
                                                class="text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Yakin
                                            </button>
                                            <button data-modal-hide="default-modal" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> --}}

        <div>
            <h2 class="mt-3 text-xl font-medium text-center">Kategori Pemilihan</h2>

            <div class="grid grid-cols-12 mt-5 gap-x-3 gap-y-5 sm:gap-y-3">

                @foreach ($elections as $election)
                    <div class="col-span-12 sm:col-span-4">
                        <a href="{{ route('front.elections.candidates', $election->slug) }}">
                            <div class="p-4 border border-gray-200 rounded-md shadow-lg hover:bg-gray-100">
                                @if ($election->status === 'Akan Datang')
                                    <strong
                                        class="px-2 py-1 text-xs font-medium text-blue-800 bg-blue-200 rounded">{{ $election->status }}
                                    </strong>
                                @elseif ($election->status === 'Sedang Berlangsung')
                                    <strong
                                        class="px-2 py-1 text-xs font-medium text-teal-800 bg-teal-300 rounded">{{ $election->status }}
                                    </strong>
                                @else
                                    <strong
                                        class="px-2 py-1 text-xs font-medium text-red-800 bg-red-200 rounded">{{ $election->status }}
                                    </strong>
                                @endif

                                <div class="mt-3 text-center">
                                    <h3 class="font-bold uppercase">{{ $election->title }}</h3>
                                    <p class="text-gray-600">Dari {{ $election->start_date->format('H.i - j M Y') }}</p>
                                    <p class="text-gray-600">Sampai {{ $election->end_date->format('H.i - j M Y') }}</p>
                                    <span class="text-sm text-gray-600">Jumlah Kandidat :
                                        {{ $election->candidates_count }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


</x-app-layout>
