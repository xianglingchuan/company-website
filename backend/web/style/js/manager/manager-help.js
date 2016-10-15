$('.article-title').click(function(){
    if ($(this).parent().find('.article-content').css('display') == 'none') {
        $(this).parent().find('.article-content').show();
    } else {
        $(this).parent().find('.article-content').hide();
    }
});