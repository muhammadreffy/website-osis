<x-app-layout title="Tambah Kategori Pemilu">
    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>


    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-[265px]">
        <div class="max-w-2xl">

            <h2 class="mb-4 text-xl font-bold text-gray-900">Tambahkan Kategori Pemilihan Terbaru</h2>

            <form action="{{ route('dashboard.elections.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 mb-3 sm:grid-cols-2 sm:gap-4">
                    <div class="sm:col-span-2">
                        <x-forms.input-text label="Judul" name="title" id="title"
                            placeholder="Misal: Pemilihan Ketua Osis Periode 2024-2025" />
                    </div>
                    <div class="w-full">
                        <x-forms.input-text type="datetime-local" label="Tanggal Mulai" name="start_date"
                            id="start_date" />
                    </div>
                    <div class="w-full">
                        <x-forms.input-text type="datetime-local" label="Tanggal Berakhir" name="end_date"
                            id="end_date" />
                    </div>

                </div>
                <x-forms.button-submit label="Tambahkan Data" />
            </form>
        </div>
    </section>
</x-app-layout>
