$(function(){
        $('#js-done').submit(function(e){
            e.preventDefault();
            let $slide = $('#js-slide');
            $slide.slideToggle('slow');
            setTimeout(function(){$slide.slideToggle('slow'); }, 2000);
            setTimeout( function() {
                $('#js-done').off( 'submit' );
                $('#js-done').submit();
            }, 2200);
        });
});
