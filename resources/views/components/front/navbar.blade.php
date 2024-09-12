<nav class="fixed w-full bg-white border-b border-gray-200">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <x-logo />
        <div class="flex items-center space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            @if (Auth::check())
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 "
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="{{ Auth::user()->username }}"
                        class="object-cover w-8 h-8 rounded-full">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow "
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 ">{{ Auth::user()->name }}</span>
                        <span class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('home') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Beranda</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pengaturan</a>
                        </li>
                        <li>
                            <form action="{{ route('auth.logout') }}" method="POST"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                @csrf
                                <button type="submit">Keluar</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('auth.signin') }}"
                    class="px-4 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Masuk
                </a>
            @endif

            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 px-3 text-gray-900 rounded md:bg-transparent md:p-0 md:hover:text-primary
                    {{ Route::is('home') ? 'bg-primary text-white md:text-primary' : '' }}"
                        aria-current="page">Beranda
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0">
                        Tentang Kami
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0">Bidang
                    </a>
                </li>
                <li>
                    <a href="{{ route('front.elections.index') }}"
                        class="block py-2 px-3 text-gray-900  rounded md:bg-transparent md:p-0 md:hover:text-primary
                    {{ Route::is('front.elections.index') ? 'bg-primary text-white md:text-primary' : '' }}">Pemilihan
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Hubungi
                        Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
