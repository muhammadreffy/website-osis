<x-app-layout title="Edit | {{ $election->title }}">
    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>


    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-[265px]">
        <div class="max-w-2xl">

            <h2 class="mb-4 text-xl font-bold text-gray-900">Edit Kategori Pemilihan Terbaru</h2>

            <form action="{{ route('dashboard.elections.update', $election->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-3 sm:grid-cols-2 sm:gap-4">
                    <div class="sm:col-span-2">
                        <x-forms.input-text label="Judul" name="title" id="title" value="{{ $election->title }}" />
                    </div>
                    <div class="w-full">
                        <x-forms.input-text type="datetime-local" label="Tanggal Mulai" name="start_date"
                            id="start_date" value="{{ $election->start_date }}" />
                    </div>
                    <div class="w-full">
                        <x-forms.input-text type="datetime-local" label="Tanggal Berakhir" name="end_date"
                            id="end_date" value="{{ $election->end_date }}" />
                    </div>
                </div>
                <x-forms.button-submit label="Perbarui Data Kategori" />
            </form>
        </div>
    </section>
</x-app-layout>
