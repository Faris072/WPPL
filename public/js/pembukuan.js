let x = $('#deskripsiBuku').text();
$('#deskripsiBuku').html(x);


function titik(element) {
    let saldo = element.html();
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

    return element.html(hasil);
}

let element = $('#saldo');
titik(element);
let jmlData = $('.arus').length;
for(let i = 0; i < jmlData; i++){
    titik($(`.arus:eq(${i})`));
}

// 1000
// unshift = 00;
// j= 3;
