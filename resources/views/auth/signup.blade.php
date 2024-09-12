<x-app-layout title="Signup">

    <section class="py-32 bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-logo />
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Daftar Akun
                    </h1>
                    <form action="{{ route('auth.signup') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-4 md:space-y-6">
                        @csrf
                        <x-forms.input-file label="Avatar" name="avatar" id="avatar"
                            description="Avatar sebaiknya memiliki rasio 1:1 dan berukuran tidak lebih dari 2MB." />

                        <x-forms.input-text label="Nama" name="name" id="name"
                            placeholder="OSIS SMK Negeri 2" />

                        <x-forms.input-text label="Username" name="username" id="username" placeholder="osis_smkn2" />

                        <x-forms.input-text type="email" label="Email" name="email" id="email"
                            placeholder="osisskanda@gmail.com" />

                        <x-forms.input-password label="Password" name="password"
                            description="Gunakan minimal 8 karakter dengan kombinasi huruf dan angka
" />

                        <x-forms.input-password label="Confirm Password" name="confirm_password" />

                        <x-forms.button-submit label="Daftar" />

                        <p class="text-sm font-light text-gray-500">
                            Sudah punya akun?
                            <a href="{{ route('auth.signin') }}" class="font-medium text-primary hover:underline">
                                Masuk sekarang
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
