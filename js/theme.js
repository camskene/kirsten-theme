KR = {};

(function($) {
    KR.packery = function(state) {
        var $container = $(".home main, .archive main");
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
                        opacity: 0,
                        visiblility: "hidden"
                    });
                    // ensure that images load before adding to masonry layout
                    $newElems.imagesLoaded(function() {
                        // show elems now they're ready
                        $newElems.animate({
                            visiblility: "visible"
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

    KR.fitVids = function() {
        $(".post").fitVids();
    }


    // KR.instagramCarousel = function() {
    //     $(".widget-instagram-carousel").bxSlider({
    //         pager: false
    //     });
    // };


    // KR.externalLinksNewWindow = function() {
    //     // Open external links in a new window
    //     $('a').each(function() {
    //         var a = new RegExp('/' + window.location.host + '/');
    //         if (!a.test(this.href)) {
    //             $(this).click(function(event) {
    //                 window.open(this.href, '_blank');
    //                 return false;
    //             });
    //         }
    //     });
    // };


    KR.toggleMenu = function() {
        $("body").on("click", ".menu-toggle", function(e) {
            e.preventDefault();
            $("body").toggleClass("off-canvas");
        })
        $("html").on("swiperight", ".off-canvas", function(e) {
            $("body").toggleClass("off-canvas");
        })
    };

    // KR.largeScreenRequests = function() {
    //     KR.ajax("header_large_screen", ".site-header .container")
    // };


    // KR.smallScreenRequests = function() {
    //     KR.ajax("header_small_screen", ".site-header .container")
    // };


    // KR.ajax = function(action, node) {
    //     $.ajax({
    //         type: "POST",
    //         url: "/wp-admin/admin-ajax.php",
    //         cache: true,
    //         data: {
    //             action: action
    //         },
    //         success: function(data, textStatus, XMLHttpRequest) {
    //             $(node).html(data);
    //         }
    //     })
    // };


})(jQuery);

jQuery(document).ready(function($) {
    KR.toggleMenu();
    KR.fitVids();

    // KR.instagramCarousel();
    // KR.externalLinksNewWindow();

    enquire.register("screen and (min-width: 640px)", {
        match : function() {
            KR.packery("on");
            KR.chosen();
            // KR.largeScreenRequests();
        },
        unmatch : function() {
            KR.packery("off");
        }
    }).register("screen and (max-width: 639px)", {
        match : function() {
            // KR.smallScreenRequests();
        }
    })
})
