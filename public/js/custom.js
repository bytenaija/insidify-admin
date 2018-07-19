$('document').ready(function() {
    $('.clickable-row').click(function() {
        var url = $(this).attr('data-href');
        console.log(url);
        window.location.href = url;
    })
});