$(document).ready(function (){


    $('.slug-name').keyup(function (){
        // slug-name olduğu yerden çık (closest) row classının icindeki slug-url i bul ve oraya url i yaz
        $(this).closest('.row').find('.slug-url').slugify($(this));
    });

});
