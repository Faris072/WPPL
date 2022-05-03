let x = $('#deskripsiBuku').text();
$('#deskripsiBuku').html(x);

let saldo = $('#saldo').html();

function titik(saldo) {
    saldo = saldo.split("");

    let j = 1;
    for(let i = saldo.length-1; i >= 0; i--){
        if(j%3==0){
            saldo.splice(i,0,'.');
        }
        j++;
    }

    if(saldo[0]=='.'){
        saldo.shift();
    }
    hasil = saldo.join('');

    $('#saldo').html(hasil);
}

titik(saldo);

// 1000
// unshift = 00;
// j= 3;
