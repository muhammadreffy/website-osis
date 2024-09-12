<x-app-layout title="Pemilihan">

    <x-slot:header>
        @include('components.front.navbar')
    </x-slot:header>

    <section class="px-4 pt-20 pb-80 md:px-8">
        <div>
            <div class="flex justify-center">
                <x-toast.success session="successVoted" />
                <x-toast.success session="cancelVoteSuccess" />


                <x-toast.warning session="error" />
                <x-toast.warning session="hasVoted" />

                <x-toast.danger session="failedVoted" />
                <x-toast.danger session="cancelVoteFailed" />
            </div>
            <div class="flex flex-col items-center justify-center max-w-screen-md mx-auto mt-3 mb-5">
                <h2 class="text-2xl font-bold text-center md:text-3xl">
                    {{ $election->title }}
                </h2>

                @if ($hasVoted)
                    <div class="mt-3">
                        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                            class="block py-2.5 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-hover focus:ring-4 focus:outline-none focus:ring-blue-300"
                            type="button">
                            Batalkan pilihan
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
                                            Membatalkan Pilihan
                                        </h3>
                                        <button type="button"
                                            class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto"
                                            data-modal-hide="default-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
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
                                            Apakah Anda yakin ingin memabatalkan pilihan?
                                        </p>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5">
                                        <form
                                            action="{{ route('front.elections.candidate.cancel-vote', [
                                                'election' => $election->slug,
                                                'vote' => $votedId,
                                            ]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button data-modal-hide="default-modal" type="submit"
                                                class="text-white bg-primary hover:bg-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Yakin
                                            </button>
                                        </form>
                                        <button data-modal-hide="default-modal" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-4 focus:ring-gray-100">Batal
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="flex flex-wrap justify-center gap-y-72 gap-x-24">
                @forelse ($candidates as $candidate)
                    <div class="w-4/5 pt-4 bg-center bg-cover rounded-lg shadow-lg md:w-72 h-72"
                        style="background-image: url({{ asset('img/merah-putih.jpg') }})">
                        <h3
                            class="flex items-center justify-center w-10 h-10 mx-auto text-2xl font-bold text-center text-white bg-orange-500 border-4 rounded-full">
                            {{ $candidate->order_number }}
                        </h3>

                        <img src="{{ Storage::url($candidate->photo) }}" alt="{{ $candidate->slug }}"
                            class="object-cover w-full aspect-square">

                        <div class="pt-2 pb-5 bg-white rounded-b-lg shadow-md">
                            <div class="text-center">
                                <h5 class="font-bold">{{ $candidate->president_name }}</h5>
                                <span class="block -mt-1 text-sm">Calon Ketua</span>
                            </div>

                            <div class="text-center">
                                <h5 class="font-bold">{{ $candidate->vice_president_name }}</h5>
                                <span class="block -mt-1 text-sm">Calon Wakil Ketua</span>
                            </div>

                            <div class="flex flex-col items-center justify-center mt-3">
                                <strong class="text-lg">
                                    {{-- @dd($candidate->votes_count) --}}
                                    @if ($candidate->votes_count === 0)
                                        0
                                    @else
                                        {{ $candidate->votes_count }}
                                    @endif
                                </strong>
                                <p class="text-sm text-gray-600">Total Suara</p>
                            </div>


                            <div
                                class="flex justify-center mt-5 gap-2 @if ($hasVoted) flex-col @endif">


                                @if (!$hasVoted)
                                    <!-- Modal toggle -->
                                    <button data-modal-target="{{ $candidate->id }}"
                                        data-modal-toggle="{{ $candidate->id }}"
                                        class="block py-2.5 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-hover focus:ring-4 focus:outline-none focus:ring-blue-300"
                                        type="button">
                                        Pilih
                                    </button>

                                    <!-- Main modal -->
                                    <div id="{{ $candidate->id }}" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-2xl max-h-full p-4">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                                                    <h3 class="text-xl font-semibold text-gray-900">
                                                        Lanjut Memilih?
                                                    </h3>
                                                    <button type="button"
                                                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto"
                                                        data-modal-hide="{{ $candidate->id }}">
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
                                                        Apakah Anda yakin ingin lanjut memilih kandidat
                                                        {{ $candidate->president_name }} dan
                                                        {{ $candidate->vice_president_name }} Anda tidak bisa
                                                        memilih kandidat lain setelah anda mengklik "Yakin" untuk pesan
                                                        ini
                                                    </p>
                                                </div>
                                                <!-- Modal footer -->
                                                <div
                                                    class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5">
                                                    <form
                                                        action="{{ route('front.elections.candidate.vote', ['election' => $election->id, 'candidate' => $candidate->id]) }}"
                                                        method="POST">
                                                        @csrf

                                                        <button data-modal-hide="{{ $candidate->id }}" type="submit"
                                                            class="text-white bg-primary hover:bg-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Yakin
                                                        </button>
                                                    </form>
                                                    <button data-modal-hide="{{ $candidate->id }}" type="button"
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-4 focus:ring-gray-100">Batal
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <p
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 text-center">
                                        Anda Sudah Memilih
                                    </p>
                                @endif
                                <a href="{{ route('front.elections.candidate.detail', $candidate->slug) }}"
                                    class="inline-flex items-center justify-center py-2.5 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary gap-x-1 hover:bg-hover focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Detail Kandidat
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Belum ada kandidat terdaftar</p>
                @endforelse

            </div>
        </div>
    </section>
</x-app-layout>
