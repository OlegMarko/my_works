$(document).ready(function() {
    var count = 20;
    var load = false;
    $(window).scroll(function() {
        //console.log($(window.scrollY));
        if (!load &&  $(window).scrollTop() + $(window).height() >= $(document).height()) {
            //console.log('Bottom');
            $.ajax({
                url: 'load.php',
                method: 'GET',
                data: {"count": count},
                beforeSend: function () {
                    load = true;
                }
            }).done(function(news) {
                //console.log(news);
                
                news = jQuery.parseJSON(news);
                if (news.length > 0) {
                    $.each(news, function(index, news) {
                        $("#news").append("<p>" + news.text + "<br /><i><b>" + news.date + "></b></i></p><hr/>");
                    });
                    
                    load = false;
                    count += 10;
                };
            });
        };
    });
});