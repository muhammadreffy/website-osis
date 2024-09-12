<x-app-layout>
    <x-slot:header>
        @include('components.front.navbar')
    </x-slot:header>



    <section class="flex items-center h-screen">
        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                OSIS: Wadah Inspirasi dan <br /> Kepemimpinan Pelajar
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48">Bersama
                OSIS, kami menginspirasi, memimpin, dan memberikan wadah bagi kreativitas serta inovasi pelajar untuk
                menciptakan lingkungan sekolah yang lebih baik. Bergabunglah dengan kami dalam perjalanan membentuk
                generasi pemimpin masa depan.
            </p>
            {{-- <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    Get started
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
                <a href="#"
                    class="px-5 py-3 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:ms-4 focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                    Learn more
                </a>
            </div> --}}
        </div>
    </section>

</x-app-layout>
