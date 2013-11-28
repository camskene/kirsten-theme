KR = {};

(function($) {
    KR.packery = function(state) {
        var $container = $(".home main");
        var $containerWidth = $container.width();
        if (state === "on") {
            $container.imagesLoaded(function() {
                $container.packery({
                    itemSelector: "article",
                    stamp: ".sticky",
                    gutter: 6
                });
            });

            $container.infinitescroll({
                    navSelector: '#nav-below', // selector for the paged navigation
                    nextSelector: '#nav-below a', // selector for the NEXT link (to page 2)
                    itemSelector: 'article', // selector for all items you'll retrieve
                    animate: true,
                    loading: {
                        finishedMsg: 'No more pages to load.',
                        img: ""
                    }
                },
                // trigger Masonry as a callback

                function(newElements) {
                    // hide new items while they are loading
                    var $newElems = $(newElements).css({
                        opacity: 0
                    });
                    // ensure that images load before adding to masonry layout
                    $newElems.imagesLoaded(function() {
                        // show elems now they're ready
                        $newElems.animate({
                            opacity: 1
                        });
                        $container.packery('appended', $newElems, true);
                    });
                }
            );
        }

        if (state === "off") {
            $container.packery("destroy");
            $container.infinitescroll("unbind");
        }


    };

    KR.chosen = function() {
        $("select").chosen({
            disable_search: true,
            width: "100%"
        });
    };

    KR.instagramCarousel = function() {
        $(".widget-instagram-carousel").bxSlider({
            pager: false
        });
    }

    KR.externalLinksNewWindow = function() {
        // Open external links in a new window
        $('a').each(function() {
            var a = new RegExp('/' + window.location.host + '/');
            if (!a.test(this.href)) {
                $(this).click(function(event) {
                    window.open(this.href, '_blank');
                    return false;
                });
            }
        });
    };

    KR.toggleMenu = function() {
        $(".menu-toggle").click(function(){
            $(this).next().toggle();
        })
    }

    KR.largeScreenRequests = function() {
        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'header_large_screen', // the PHP function to run
            },
            success: function(data, textStatus, XMLHttpRequest) {
                $('.site-header .container').html(data); // put our list of links into it
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                if(typeof console === "undefined") {
                    console = {
                        log: function() { },
                        debug: function() { },
                    };
                }
                if (XMLHttpRequest.status == 404) {
                    console.log('Element not found.');
                } else {
                    console.log('Error: ' + errorThrown);
                }
            }
        });

    }


    KR.smallScreenRequests = function() {
        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'header_small_screen', // the PHP function to run
            },
            success: function(data, textStatus, XMLHttpRequest) {
                $('.site-header .container').html(data); // put our list of links into it
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                if(typeof console === "undefined") {
                    console = {
                        log: function() { },
                        debug: function() { },
                    };
                }
                if (XMLHttpRequest.status == 404) {
                    console.log('Element not found.');
                } else {
                    console.log('Error: ' + errorThrown);
                }
            }
        });

    }


})(jQuery);

jQuery(document).ready(function($) {
    KR.chosen();
    KR.instagramCarousel();
    // KR.externalLinksNewWindow();
    KR.toggleMenu();

    enquire.register("screen and (min-width: 700px)", {
        match : function() {
            KR.packery("on");
            KR.largeScreenRequests();
        },
        unmatch : function() {
            KR.packery("off");
        }
    })

    enquire.register("screen and (max-width: 699px)", {
        match : function() {
            KR.smallScreenRequests();
        }
    })

})

jQuery(window).load(function() {
})
