<?php

return [
    // Exceptions
    'invalidModel'              => 'Model {0} harus dimuat terlebih dahulu untuk digunakan.',
    'userNotFound'              => 'Tidak dapat menemukan pengguna dengan ID = {0, number}.',
    'noUserEntity'              => 'Entitas pengguna harus disediakan untuk validasi kata sandi.',
    'tooManyCredentials'        => 'Anda hanya dapat memvalidasi terhadap 1 identitas selain kata sandi.',
    'invalidFields'             => ' "{0}" tidak dapat digunakan untuk memvalidasi identitas.',
    'unsetPasswordLength'       => 'Anda harus menyetel pengaturan `minimumPasswordLength` di file konfigurasi Auth.',
    'unknownError'              => 'Maaf, kami mengalami masalah saat mengirim email kepada Anda. Silakan coba lagi nanti.',
    'notLoggedIn'               => 'Anda harus masuk untuk mengakses halaman itu.',
    'notEnoughPrivilege'        => 'Anda tidak memiliki izin untuk mengakses halaman tersebut.',

    // Registration
    'registerDisabled'          => 'Maaf, pengguna baru tidak diperkenankan untuk saat ini.',
    'registerSuccess'           => 'Selamat bergabung! Silakan masuk dengan identitas baru Anda.',
    'registerCLI'               => 'Pengguna berhasil dibuat: {0}, #{1}',

    // Activation
    'activationNoUser'          => 'Tidak dapat menemukan pengguna dengan kode aktivasi tersebut.',
    'activationSubject'         => 'Aktivasi akunmu',
    'activationSuccess'         => 'Silahkan konfirmasi akun Anda dengan mengklik link aktivasi di email yang telah kami kirimkan.',
    'activationResend'          => 'Kirim ulang pesan aktivasi sekali lagi.',
    'notActivated'              => 'Pengguna belum diaktivasi. Silakan lakukan aktivasi terlebih dahulu',
    'errorSendingActivation'    => 'Gagal mengirim pesan aktivasi ke: {0}',

    // Login
    'badAttempt'                => 'Anda tidak dapat masuk. Harap periksa identitas.',
    'loginSuccess'              => 'Selamat datang!',
    'invalidPassword'           => 'Anda tidak dapat masuk. Harap periksa kata sandi Anda.',

    // Forgotten Passwords
    'forgotDisabled'            => 'Ulang kata sandi telah dinonaktifkan.',
    'forgotNoUser'              => 'Email tersebut tidak sesuai dengan pengguna manapun.',
    'forgotSubject'             => 'Instruksi ulang kata sandi.',
    'resetSuccess'              => 'Kata sandi berhasil diubah. Silakan masuk dengan kata sandi baru.',
    'forgotEmailSent'           => 'Token keamanan telah dikirim melalui email anda. Masukkan token tersebut kedalam kotak di bawah untuk melanjutkan.',
    'errorEmailSent'            => 'Tidak dapat mengirim email dengan instruksi ulang kata sandi ke: {0}',
    'errorResetting'            => 'Tidak dapat mengirim instruksi ulang ke {0}',

    // Passwords
    'errorPasswordLength'       => 'Kata sandi setidaknya harus memiliki panjang {0, number} karakter.',
    'suggestPasswordLength'     => 'Terlalu Panjang - Hanya sampai 255 karakter - buatlah kata sandi yang lebih aman dan mudah diingat.',
    'errorPasswordCommon'       => 'Kata sandi terlalu sering digunakan oleh umum.',
    'suggestPasswordCommon'     => 'Kata sandi telah diperiksa terhadap lebih dari 65 ribu lainnya yang umum digunakan atau kata sandi yang telah bocor melalui peretasan.',
    'errorPasswordPersonal'     => 'Kata sandi tidak boleh berisi informasi pribadi yang di-hash ulang.',
    'suggestPasswordPersonal'   => 'Variasi pada alamat email atau nama pengguna Anda tidak boleh digunakan untuk kata sandi.',
    'errorPasswordTooSimilar'    => 'Kata sandi terlalu mirip dengan username.',
    'suggestPasswordTooSimilar'  => 'Jangan gunakan bagian dari username kedalam kata sandi.',
    'errorPasswordPwned'        => 'Kata sandi {0} telah diekspos karena pelanggaran data dan telah terlihat {1, number} kali dalam {2} dari kata sandi yang disusupi.',
    'suggestPasswordPwned'      => '{0} tidak boleh digunakan sebagai kata sandi. Jika Anda menggunakannya di mana saja, segera ubah.',
    'errorPasswordPwnedDatabase' => 'database',
    'errorPasswordPwnedDatabases' => 'database',
    'errorPasswordEmpty'        => 'Kata sandi harus diisi.',
    'passwordChangeSuccess'     => 'Kata sandi berhasil dirubah',
    'userDoesNotExist'          => 'Kata sandi tidak dapat diubah. Pengguna tidak dapat ditemukan',
    'resetTokenExpired'         => 'Maaf. Token reset Anda telah kedaluwarsa.',

    // Groups
    'groupNotFound'             => 'Tidak mendapatkan group: {0}.',

    // Permissions
    'permissionNotFound'        => 'Tidak mendapatkan izin: {0}',

    // Banned
    'userIsBanned'              => 'Pengguna telah diblokir. Silakan hubungi administrator',

    // Too many requests
    'tooManyRequests'           => 'Terlalu banyak permintaan. Tolong tunggu {0, number} detik.',

    // Login views
    'home'                      => 'Beranda',
    'current'                   => 'Saat ini',
    'forgotPassword'            => 'Apakah kamu lupa kata sandi?',
    'enterEmailForInstructions' => 'Tidak masalah! Masukkan emailmu dibawah ini dan kami akan mengirim instruksi untuk mereset passwordmu.',
    'email'                     => 'Email',
    'emailAddress'              => 'Alamat Email',
    'sendInstructions'          => 'Kirim Instruksi',
    'loginTitle'                => 'Masuk',
    'loginAction'               => 'Login',
    'rememberMe'                => 'Ingat Saya',
    'needAnAccount'             => 'Pengguna baru?',
    'forgotYourPassword'        => 'Lupa kata sandi?',
    'password'                  => 'Kata sandi',
    'repeatPassword'            => 'Konfirmasi Kata sandi',
    'emailOrUsername'           => 'Email atau username',
    'username'                  => 'Username',
    'name'                      => 'Nama',
    'profilePicture'            => 'Gambar Profile',
    'register'                  => 'Daftar',
    'signIn'                    => 'Silakan LMasuk',
    'alreadyRegistered'         => 'Sudah terdaftar?',
    'weNeverShare'              => 'Kami tidak akan menyebarkan emailmu kepada orang lain.',
    'resetYourPassword'         => 'Ulang kata sandi',
    'enterCodeEmailPassword'    => 'Masukkan kode yang kamu dapatkan dari email, alamat emailmu, dan kata sandi barumu.',
    'token'                     => 'Token',
    'newPassword'               => 'Kata sandi Baru',
    'newPasswordRepeat'         => 'Ulangi kata sandi Baru',
    'resetPassword'             => 'Ulang kata sandi',
];
