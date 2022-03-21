# PJECT WORKSHOP PRODUKSI PERANGKAT LUNAK

Kelompok 6: 
- Bagas Prakoso (3120510109)
- Muhammad Farhan Bilnazari (3120510103)
- Muhammad Faris Shafwan (3120510104)
- Fathan Willdany (3120510105)
- Rifa'i Anggara Pratama (3120510101)
- Nabila
- Khafid
- Bagas Maulana R (3120510609)
- Bayu
- 

Pembagian Tugas: 

Front End:
- Fathan
- Farhan
- Nabila
- Khafid
- Rifa'i

Back end:
- Muhammad Faris Shafwan (3120510104)
- Bagas P
- Bagas Maulana (3120510609)
- Bayu


##Cara menggunakan github
- pastikan anda sudah menjadi colaborate dengan klik link yang sudah di bagikan di grub whatsapp atau anda bisa fork ke akun anda (lebih disarankan menjadi colaborate)
- jika sudah melakukan cara di atas maka selanjutnya anda cloning project di github ke komputer anda dengan mengetikkan perintah `git clone {url github}`
- INGAT! setelah clone, ketik di terminal `composer install` supaya artisan bisa berjalan dan migrate database. nama database `project-akhir-wawbw`. 
- cek apakah sudah di init atau belum. cara mengetahui sudah di initialisasi atau belum adalah jika sudah di inisialisasi akan ada `(nama branch)` setelah path folder project anda di terminal git bash.
- jika belum ada maka anda harus initials dulu folder tersebut dengan perintah `git init`.
- untuk menghapus semua git repo dan membatalkan init maka ketikkan `rm -rf .git`.
- cara membuat branch di git adlah dengan perintah `git branch {nama branch}`. 
- cara berpindah branch adalah dengan mengetikkan perintah `git checkout {nama branch}`.
- untuk commit jika setiap ada file baru harus menggunakan `git add .` dulu lalu `git commit -m "{pesan commit}"`.
- untuk commit jika tidak ada file baru atau file di hapus atau hanya ingin mengupdate maka cukup gunakan perintah `git commit -am "{pesan commit}"`
- untuk mengechek remot cukup ketikkan perintah `git remote`
- untuk menambahkan remot cukup ketikkan perintah `git remote add {nama remote} {url github}` 
- untuk rename remote cukup ketikkan perintah `gir remote rename {nama remote sebelumnya} {nama remote baru}` 
- untuk push, nama branch lokal anda harus sama dengan branch yang akan anda push dengan mengetikkan `git push -u {nama remote anda} {nama branch yang akan anda push}`.
- untuk pull pastikan branch lokal anda sama dengan branch yang akan anda pull. pull menggunakan perinatah `git pull {nama remote} {nama branch}`.
- jangan lupa setelah cloning, sebelum push, dan sesudah pull di commit di branch lokal anda.
- langkah untuk commit saat setelah cloning adalah dengan menambahkan dulu semua yang ada di project anda ke repo lokal anda dengan perintah `git add .` lalu setelah itu di commit dengan perintah `git commit -m "{pesan commit anda}"` 
- langkah untuk commit selain setelah clonning (dengan kata lain memperbarui repo lokal anda) adalah dengan mengetikan perintah `git commit -am "{pesan commit anda}"`.
- untuk meningkatkan ukuran buffer ketik `$ git config http.postBuffer {ukuran buffer dalam bentuk byte}`. contoh `$ git config http.postBuffer 524288000` (meningkatkan ukuran buffer ke 500mb)
- Menghapus branch di git local dengan perintah `git branch -d {nama_branch}`


#error di git
- `fatal: refusing to merge unrelated histories` saat pull. cara mengatasi: `git pull {nama remote} {nama branch} --allow-unrelated-histories`
- `error: src refspec faris does not match any` saat push. cara mengatasi: nama branch lokal anda harus sama dengan branch yang akan anda push.
- saat pull terdapat `Already up to date.` tapi di lokal anda tidak ada yang berubah. itu berarti di lokal anda lebih update daripada di github dan di github tidak ada perubahan apapun. jika anda tetap ingin pull ke github anda harus ada perubahan dan di commit dulu di githubnya setelah itu anda bisa pull lagi.
- `error: failed to push some refs to 'https://github.com/Faris072/percobaan-github'` saat push. itu tandanya anda harus pull dulu dari github supaya lokal anda pudate atau sinkron dengan github setelah itu anda bisa coba push lagi beserta perubahan anda.
- laravel tidak bisa jalan setelah menggunakan git. cara mengatasinya adalah di comand prompt ketik `composer install`. lalu ketikkan lagi composer dumpautoload`

#error di laravel
- jika ada error gambar tidak muncul dan saat di symbolic link menggunakan perintah `php artisan storage:link` masih tidak muncul, maka hapus directory symbolic linknya yang berada di dalam folder public, lalu cari directory storage dan hapus folder tersebut.
