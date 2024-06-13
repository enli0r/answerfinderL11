import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

$(function(){
    $('.search-form').on('click', function(){
        var id= $(this).attr('id');
        
        $('#'+id+'-input').focus();
    })
})