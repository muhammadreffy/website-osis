<x-app-layout title="Tambah Kandidat">
    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>


    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-[265px]">
        <div class="max-w-2xl">

            <h2 class="mb-4 text-xl font-bold text-gray-900">Tambahkan Kandidat Terbaru</h2>

            <form action="{{ route('dashboard.candidates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-3 sm:grid-cols-2 sm:gap-4">

                    <div class="sm:col-span-2">
                        <x-forms.input-text type="number" label="No Urut" name="order_number" id="order_number"
                            placeholder="Misal: 1" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="election_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Kategori Pemilihan
                        </label>
                        <select id="election_id" name="election_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>Pilih kategori</option>

                            @foreach ($elections as $election)
                                <option value="{{ $election->id }}">{{ $election->title }}</option>
                            @endforeach
                        </select>

                        <p class="mt-2 text-xs text-red-600">
                            @error('election_id')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>

                    <div class="sm:col-span-2">
                        <x-forms.input-text label="Nama Ketua" name="president_name" id="president_name"
                            placeholder="Misal: Muhammad Reffy" />
                    </div>

                    <div class="sm:col-span-2">
                        <x-forms.input-text label="Nama Wakil Ketua" name="vice_president_name" id="vice_president_name"
                            placeholder="Misal: Muhammad Zidane" />
                    </div>

                    <div class="sm:col-span-2">
                        <x-forms.input-file label="Foto" name="photo" id="photo"
                            description="Foto sebaiknya memiliki rasio 1:1 dan berukuran tidak lebih dari 2MB." />
                    </div>

                    <div class="sm:col-span-2">
                        <x-forms.textarea label="Description" name="description" id="description"
                            placeholder="Misal: Muhammad Reffy dari kelas XII RPL 3" />
                    </div>

                    <div class="sm:col-span-2">
                        <x-forms.textarea label="Visi" name="visi" id="visi"
                            placeholder="Misal: Menuju OSIS yang inspiratif, kolaboratif, dan berdampak positif." />
                    </div>

                    <div class="sm:col-span-2">
                        <x-forms.textarea label="Misi" name="misi" id="misi"
                            placeholder="Misal: Menggalakkan tidak ada istilah senior dan junior, semua saling membantu." />
                    </div>

                </div>
                <x-forms.button-submit label="Tambahkan Data" />
            </form>
        </div>
    </section>
</x-app-layout>
