<x-app-layout title="Edit Kandidat | {{ $candidate->president_name . '-' . $candidate->vice_president_name }}">
    <x-slot:header>
        @include('components.dashboard.navbar')
    </x-slot:header>


    @include('components.dashboard.sidebar')

    <section class="p-4 mt-16 sm:ml-[265px]">
        <div class="max-w-2xl">

            <h2 class="mb-4 text-xl font-bold text-gray-900">Edit Kandidat</h2>

            <form action="{{ route('dashboard.candidates.update', $candidate->slug) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-3 sm:grid-cols-2 sm:gap-4">

                    <div class="sm:col-span-2">
                        <x-forms.input-text type="number" label="No Urut" name="order_number" id="order_number"
                            value="{{ $candidate->order_number }}" />
                    </div>

                    <div class="sm:col-span-2">
                        <label for="election_id" class="block mb-2 text-sm font-medium text-gray-900">
                            Kategori Pemilihan
                        </label>
                        <select id="election_id" name="election_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected disabled>Pilih kategori</option>

                            @foreach ($elections as $election)
                                <option value="{{ $election->id }}"
                                    {{ $election->id == $candidate->election_id ? 'selected' : '' }}>
                                    {{ $election->title }}
                                </option>
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
                            value="{{ $candidate->president_name }}" />
                    </div>

                    <div class="sm:col-span-2">
                        <x-forms.input-text label="Nama Wakil Ketua" name="vice_president_name" id="vice_president_name"
                            value="{{ $candidate->vice_president_name }}" />
                    </div>

                    <div class="sm:col-span-2">
                        <x-forms.input-file label="Foto" name="photo" id="photo"
                            value="{{ Storage::url($candidate->photo) }}" />
                    </div>

                    <div class="sm:col-span-2">
                        <x-forms.textarea label="Description" name="description" id="description"
                            value="{{ $candidate->description }}" />
                    </div>

                    <div class="sm:col-span-2">
                        <x-forms.textarea label="Visi" name="visi" id="visi"
                            value="{{ $candidate->visi }}" />
                    </div>

                    <div class="sm:col-span-2">
                        <x-forms.textarea label="Misi" name="misi" id="misi"
                            value="{{ $candidate->misi }}" />
                    </div>

                </div>
                <x-forms.button-submit label="Perbarui Data Kandidat" />
            </form>
        </div>
    </section>
</x-app-layout>
