<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 {{ Route::is('dashboard.index') ? 'text-gray-900' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span
                        class="ms-3 whitespace-nowrap
                        {{ Route::is('dashboard.index') ? 'text-gray-900 font-semibold' : '' }}">Dashboard</span>
                </a>
            </li>
            @role('admin')
                <li>
                    <a href="{{ route('dashboard.elections.index') }}"
                        class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-6 h-6 text-gray-700 {{ Route::is('dashboard.elections.index') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M4 6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h11.613a2 2 0 0 0 1.346-.52l4.4-4a2 2 0 0 0 0-2.96l-4.4-4A2 2 0 0 0 15.613 6H4Z" />
                        </svg>

                        <span
                            class="ms-3 whitespace-nowrap
                        {{ Route::is('dashboard.elections.index') ? 'text-gray-900 font-semibold' : '' }}">Kategori
                            Pemilihan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.candidates.index') }}"
                        class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100 group">

                        <svg class="w-6 h-6 text-gray-700 {{ Route::is('dashboard.candidates.index') ? 'text-gray-900' : '' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                clip-rule="evenodd" />
                        </svg>


                        <span
                            class="ms-3 whitespace-nowrap
                        {{ Route::is('dashboard.candidates.index') ? 'text-gray-900 font-semibold' : '' }}">
                            Kandidat
                        </span>
                    </a>
                </li>
            @endrole
        </ul>
    </div>
</aside>
