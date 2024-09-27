<p>
    Tujuan utama dari website ini adalah untuk mempermudah proses pemilihan dalam lingkungan sekolah, seperti pemilihan Ketua dan Wakil Ketua OSIS, Ketua MPK, Ketua Komdis, dan posisi lainnya. Website ini dirancang untuk menyediakan platform pemungutan suara yang efisien dan transparan, sehingga seluruh proses pemilihan dapat dilakukan secara online dengan mudah oleh siswa dan pihak sekolah.
</p>

<p>
    Dengan fitur-fitur yang disesuaikan untuk kebutuhan sekolah, sistem ini akan membantu meminimalisir kesalahan manual dan memfasilitasi perhitungan suara secara otomatis, serta memberikan akses kepada siswa untuk berpartisipasi dalam pemilihan kapan saja selama periode pemilihan berlangsung.
</p>

<h2>
    Fitur fitur utama
</h2>

<p>
    Authentication: Sistem ini memiliki fitur registrasi dan login untuk memastikan setiap pengguna terverifikasi sebelum dapat mengakses fungsionalitas utama.
</p>

<p>
    Role-based Access Control: Terdapat dua peran utama dalam sistem ini:
</p>

<p>
Admin: Admin bertanggung jawab mengelola seluruh data pemilihan, termasuk menambahkan nama kandidat, menentukan waktu mulai dan berakhirnya pemilihan, serta memantau proses voting.
Pengguna Biasa: Pengguna biasa hanya memiliki akses untuk melihat daftar kandidat yang terdaftar dan memberikan suara selama periode pemilihan berlangsung.
</p>

<p>
    Pengelolaan Waktu Pemilihan: Admin dapat menetapkan waktu dimulainya dan berakhirnya pemilihan, sehingga sistem secara otomatis menutup pemungutan suara setelah waktu yang ditentukan berakhir.
</p>

<p>
    Voting: Pengguna yang telah login dapat melihat data kandidat yang terdaftar dan memberikan suara mereka secara online.
Setiap pengguna hanya bisa memberikan satu suara untuk setiap kategori pemilihan. Jika pengguna ingin mengganti pilihannya, ia harus terlebih dahulu membatalkan pilihan sebelumnya sebelum memilih kandidat lain.
</p>

<h3>
    User Flow
</h3>

<p>
    Akun Admin Otomatis: Setelah aplikasi ini dijalankan di server hosting, akun admin otomatis dibuat tanpa perlu registrasi manual. Pengguna biasa tidak memiliki cara untuk mengubah dirinya menjadi admin, memastikan bahwa hanya admin yang memiliki kontrol penuh atas pengelolaan sistem.
</p>

<p>
    Akses Pengguna Biasa: Pengunjung atau pengguna biasa hanya memiliki satu fungsi dalam aplikasi, yaitu voting. Mereka tidak dapat membuat kategori, menambahkan kandidat, atau mengakses pengaturan admin lainnya.
</p>

<p>
    Pembuatan Kategori Pemilihan oleh Admin: Ketika akan melakukan pemilihan, admin harus terlebih dahulu membuat kategori pemilihan. Kategori ini akan menentukan jenis pemilihan yang sedang berlangsung, seperti pemilihan Ketua OSIS, Ketua MPK, atau lainnya.
    
</p>

<ul>
        <li>
            Saat pembuatan kategori, admin juga akan menentukan tanggal mulai dan tanggal berakhir dari pemilihan tersebut.
Sistem secara otomatis mendeteksi status pemilihan berdasarkan waktu, apakah pemilihan sedang berlangsung, akan datang, atau sudah selesai/tutup.
        </li>
    </ul>

<p>
    Penambahan Kandidat: Setelah kategori pemilihan dibuat, admin dapat menambahkan kandidat. Saat menambahkan kandidat, admin harus menentukan kategori pemilihan mana yang diikuti oleh kandidat tersebut.
</p>

<p>
    Proses Voting
</p>

<ul>
    <li>
        Jika status pemilihan adalah "akan datang", pengguna belum bisa memberikan suara.
    </li>  
</ul>

<ul>
    <li>
        Jika status pemilihan "sedang berlangsung", pengguna dapat melihat kandidat dan memberikan suara sesuai dengan pilihannya. Pengguna hanya dapat memberikan satu suara per kategori, dan jika ingin mengganti pilihan, mereka harus membatalkan suara sebelumnya.
    </li>
</ul>

<ul>
    <li>
        Jika status pemilihan "sudah ditutup", pengguna tidak bisa lagi melakukan voting dan hanya bisa melihat hasil atau informasi terkait pemilihan tersebut.
    </li>
</ul>


<h3>Tech Stack:</h3>
<ol>
    <li>
        Laravel
    </li>
<li>
    Flowbite
</li>
</ol>
