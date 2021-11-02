if (window.innerWidth <= 600) {
    $('#btnsidebar').html('<i class="fas fa-bars"></i>');
    $('.sidebar').width(0);
    $('#isi').css('width', '100%');
}
else {
    $('#btnsidebar').html('<i class="fas fa-times"></i>');
}
$('#btnsidebar').on('click', function () {
    if ($('.sidebar').width() != 0) {
        $('.sidebar').width(0);
        $('#isi').css('width', '100%');
        $('#isi').css('filter', 'blur(0)');
        $('#btnsidebar').html('<i class="fas fa-bars"></i>');
    }
    else if (window.innerWidth <= 600) {
        $('.sidebar').css('width', '80%');
        $('#isi').css('width', '20%');
        $('#isi').css('filter', 'blur(3px)');
        $('#btnsidebar').html('<i class="fas fa-times"></i>');
    }
    else {
        $('.sidebar').css('width', '20%');
        $('#isi').css('width', '80%');
        $('#btnsidebar').html('<i class="fas fa-times"></i>');
    }
});

$('#btnmode').on('click', function () {
    if($('#isi').hasClass('bgDark')){
    $('#isi').removeClass('bgDark');
    $('#btnmode').html('<button class="rounded-circle btn btn-dark" id="btnmode"><i class="fas fa-moon fa-2x" style="color:yellow;"></i></button>');
    }
    else{
        $('#isi').addClass('bgDark');
        $('#btnmode').html('<button class="rounded-circle btn btn-dark" id="btnmode"><i class="fas fa-sun fa-2x" style="color:yellow;"></i>');
    }
});
