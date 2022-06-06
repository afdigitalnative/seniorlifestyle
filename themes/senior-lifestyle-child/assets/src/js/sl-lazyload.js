
// Global Object
var sl_lazy = {};

sl_lazy.mcvTarget = document.getElementById('welcome_video');
sl_lazy.mainThumbTarget = document.getElementById('lifestyle_options');
sl_lazy.fpThumbTarget = document.getElementById('schedule_tour');
// sl_lazy.fbEventTarget = document.getElementById('blog_events_section');

if ("IntersectionObserver" in window) {

    sl_lazy.mcvObserver = new IntersectionObserver(function(changes) {

        for (var i=0; i< changes.length;i++) {
            var change = changes[i];
            if (change.intersectionRatio > 0) {
                $('.mcv-video-container').html(mcvVideoEmbed);

                // stop watching and triggering the event handler
                sl_lazy.mcvObserver.unobserve(sl_lazy.mcvTarget);
            }
        }

    }, {});

    sl_lazy.mainThumbObserver = new IntersectionObserver(function(changes) {

        for (var i=0; i< changes.length;i++) {
            var change = changes[i];
            if (change.intersectionRatio > 0) {
                //$('.photo-gallery-section .gallery-container').prepend(mainThumbGallery);

                // stop watching and triggering the event handler
                sl_lazy.mainThumbObserver.unobserve(sl_lazy.mainThumbTarget);

                // Equalize the height
                setTimeout(function() {
                    $('.img-display-gallery-item').equalizeHeight();
                }, 2000);  // give some time for the images to all load. and the non-image block will expand its height.

                $('.gallery-img-wrapper').on('click', function() {
                    addImages('#main_photo_gallery', mainContentGallery);
                });
            }
        }

    }, {});

    sl_lazy.fpThumbObserver = new IntersectionObserver(function(changes){

       for (var i=0; i< changes.length;i++) {
            var change = changes[i];
            if (change.intersectionRatio > 0) {
                $('.floorplans-section .fp-gallery-container').prepend(thumbFloorplan);

                setTimeout(function() {
                    $('.fp-img-wrapper').equalizeHeight('.more-fp-images');
                }, 2000);  // give some time for the images to all load. and the non-image block will expand its height.

                // // stop watching and triggering the event handler
                sl_lazy.fpThumbObserver.unobserve(sl_lazy.fpThumbTarget);

                $('.fp-img-wrapper').on('click', function() {
                    addImages('#floor_plan_gallery', contentFloorplan);
                });
            }
        }

    }, {});


    // sl_lazy.fbEventObserver = new IntersectionObserver(changes => {

    //     for (const change of changes) {
    //         if (change.intersectionRatio > 0) {
    //             $('.events-embed-container').html(fbEventEmbed);

    //             // // stop watching and triggering the event handler
    //             sl_lazy.fbEventObserver.unobserve(sl_lazy.fbEventTarget);
    //         }
    //     }

    // }, {});

} else {
    // Load images anyway
    //$('.photo-gallery-section .gallery-container').prepend(mainThumbGallery);

    //$('.floorplans-section .fp-gallery-container').prepend(thumbFloorplan);

    $('.mcv-video-container').html(mcvVideoEmbed);

    $('.events-embed-container').html(fbEventEmbed);

    // Equalize the height
    setTimeout(function() {
        $('.img-display-gallery-item').equalizeHeight();
    }, 300);  // give some time for the images to all load. and the non-image block will expand its height.

    $('.gallery-img-wrapper').on('click', function() {
                    addImages('#main_photo_gallery', mainContentGallery);
                });
                $('.fp-img-wrapper').on('click', function() {
                    addImages('#floor_plan_gallery', contentFloorplan);
                });
}

// Watch a section above to trigger the observer's callback
if(sl_lazy.mcvObserver && sl_lazy.mcvTarget){
sl_lazy.mcvObserver.observe(sl_lazy.mcvTarget);

sl_lazy.mainThumbObserver.observe(sl_lazy.mainThumbTarget);

sl_lazy.fpThumbObserver.observe(sl_lazy.fpThumbTarget);
}
// sl_lazy.fbEventObserver.observe(sl_lazy.fbEventTarget);
