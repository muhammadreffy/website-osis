<x-app-layout title="Sign In">

    <section class="h-screen bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-logo />

            <div class="mt-3 mb-4">
                <x-toast.success session="registrationSuccess" />
            </div>

            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Masuk
                    </h1>
                    <form action="{{ route('auth.signin-authenticate') }}" method="POST" class="space-y-4 md:space-y-5">
                        @csrf

                        <x-forms.input-text type="email" label="Email" name="email" id="email"
                            placeholder="osisskanda@gmail.com" />

                        <x-forms.input-password label="Password" name="password" />

                        <x-forms.button-submit label="Masuk" />

                        <p class="text-sm font-light text-gray-500">
                            Belum punya akun? <a href="{{ route('auth.signup') }}"
                                class="font-medium text-primary hover:underline">Ayo daftar
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
