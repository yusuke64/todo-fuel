$(function(){
    $('#add').on('click', function(e) {
        if($('.write').val() == 0){
        e.preventDefault();
        let $slide = $('#add-empty');
        $slide.slideToggle(300);
        setTimeout(function(){$slide.slideToggle('fast'); }, 1500);
        }
    });
    var $toggleMsg = $('#js-slide');
    if($toggleMsg.length){
        $toggleMsg.slideDown(500);
        setTimeout(function(){ $toggleMsg.slideUp(); },2000);
    }
});
