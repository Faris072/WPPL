let jumlah = $('#jumlah').text();
let jml = parseInt(jumlah);
for(i=0; i < jml; i++){
    let x = $('.Hdeskripsi'+i).text();//di ambil dari type text dulu lalu di konversi ke html
    $('.deskripsi'+i).html(x);
}

