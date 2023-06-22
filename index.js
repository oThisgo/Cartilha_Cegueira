tabs = 0;
$('.skip-menu').hide();
$('html').keyup(function (e) {

    if (e.keyCode == 9) {
        $('.skip-menu').show();
        tabs = tabs +1;
        $('[tabindex=' + tabs + ']').focus();

        if( tabs >7){

            $('.skip-menu').hide();

            //tabs = 0;

        }

        return false;

    }

});