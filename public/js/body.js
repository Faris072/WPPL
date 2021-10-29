$('#btnsidebar').on('click', function(){
    if($('.sidebar').width() != 0){
        $('.sidebar').width(0);
        $('#isi').css('width','100%');
        $('#isi').css('filter','blur(0)');
    }
    else if(window.innerWidth <= 600){
        $('.sidebar').css('width','80%');
        $('#isi').css('width','20%');
        $('#isi').css('filter','blur(3px)');
    }
    else{
        $('.sidebar').css('width','20%');
        $('#isi').css('width','80%');
    }
});
