$(function () {
    var count = 0;
    $('.owl-carousel').each(function () {
        $(this).attr('id', 'owl-demo' + count);
        $('#owl-demo' + count).owlCarousel({
            navigation: false,
            slideSpeed: 200,
            pagination: true,
            singleItem: true,
            autoPlay: 10000,
            autoHeight: true
        });
        count++;
    });
});


