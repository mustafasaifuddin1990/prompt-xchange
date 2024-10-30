jQuery(document).ready(function () {
    jQuery(".image_caresol ").owlCarousel({
        items: -1,
        loop: true,
        nav: false,
        dots: false,
        margin: 20,
        // stagePadding:50,
        autoplay: false,
        navText: [
            "<i class='fa-solid fa-arrow-left'></i> ",
            "<i class='fa-solid fa-arrow-right'></i>",
        ],
        responsive: {
            0: {
                items: 1,
            },
            400: {
                items: 2,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 4,
            },
            1200: {
                items: 7,
            },
            1366: {
                items: 8.5,
            },
        },
    });
});
$(window).on("load", function () {
    // Show lightbox on image click
    jQuery(".gallery_sec").on("click", "img", function () {
        var $img = jQuery(this);
        jQuery(".lightbox")
            .fadeIn(300)
            .append(
                "<img src='" +
                $img.attr("src") +
                "' alt='" +
                $img.attr("alt") +
                "' />"
            );
        jQuery(".filter").css(
            "background-image",
            "url(" + $img.attr("src") + ")"
        );
        jQuery("html").css("overflow", "hidden");

        if ($img.is(":last-child")) {
            jQuery(".arrowr").hide();
            jQuery(".arrowl").show();
        } else if ($img.is(":first-child")) {
            jQuery(".arrowr").show();
            jQuery(".arrowl").hide();
        } else {
            jQuery(".arrowr, .arrowl").show();
        }
    });

    // Close lightbox
    jQuery(".close").on("click", function () {
        closeLightbox();
    });

    // Close lightbox on 'Esc' key press
    jQuery(document).keyup(function (e) {
        if (e.keyCode == 27) {
            closeLightbox();
        }
    });

    // Navigate to the next image
    jQuery(".arrowr").on("click", function () {
        navigateLightbox("next");
    });

    // Navigate to the previous image
    jQuery(".arrowl").on("click", function () {
        navigateLightbox("prev");
    });

    // Function to close the lightbox
    function closeLightbox() {
        jQuery(".lightbox").fadeOut(300);
        jQuery(".lightbox img").remove();
        jQuery("html").css("overflow", "auto");
    }

    // Function to navigate through images
    // function navigateLightbox(direction) {
    //   var imgSrc = jQuery(".lightbox img").attr("src");
    //   var $currentImg = jQuery(".gallery_sec").find("img[src='" + imgSrc + "']");
    //   var $newImg = (direction === "next") ? $currentImg.next() : $currentImg.prev();

    //   if ($newImg.length) {
    //     var newImgSrc = $newImg.attr("src");
    //     jQuery(".lightbox img").attr("src", newImgSrc);
    //     jQuery(".filter").css("background-image", "url(" + newImgSrc + ")");
    //   }

    //   if ($newImg.is(":last-child")) {
    //     jQuery(".arrowr").hide();
    //     jQuery(".arrowl").show();
    //   } else if ($newImg.is(":first-child")) {
    //     jQuery(".arrowr").show();
    //     jQuery(".arrowl").hide();
    //   } else {
    //     jQuery(".arrowr, .arrowl").show();
    //   }
    // }
    function navigateLightbox(direction) {
        var imgSrc = jQuery(".lightbox img").attr("src");
        var $currentImg = jQuery(".gallery_sec")
            .find("img[src='" + imgSrc + "']")
            .closest(".post--item");
        var $newImgItem =
            direction === "next"
                ? $currentImg.next(".post--item")
                : $currentImg.prev(".post--item");

        if ($newImgItem.length) {
            var newImgSrc = $newImgItem.find("img").attr("src");
            jQuery(".lightbox img").attr("src", newImgSrc);
            jQuery(".filter").css("background-image", "url(" + newImgSrc + ")");
        }

        // Update navigation button visibility
        if (!$newImgItem.next(".post--item").length) {
            jQuery(".arrowr").hide();
        } else {
            jQuery(".arrowr").show();
        }

        if (!$newImgItem.prev(".post--item").length) {
            jQuery(".arrowl").hide();
        } else {
            jQuery(".arrowl").show();
        }
    }
});

// Testimonials
//      jQuery('.testimonials_sec .testimonial_row ').owlCarousel({
//     items:-1,
//     loop:false,
//     nav:false,
//     dots:false,
//     margin:20,
//     autoplay:false,
//     responsive: {
//     0: {
//         items: 1,
//     },
//     600: {
//         items: 1
//     },
//     1000: {
//         items: 1.1
//     },
//    1200: {
//         items: 1.5
//     },
//     1366: {
//         items: 1.5
//     }
//     }

// });
//    });

//    $(document).ready(function() {
//         // Get the pathname
//         var pathname = window.location.pathname;

//         // Extract the last part of the pathname as the class name
//         var className = pathname.substring(pathname.lastIndexOf('/') + 1).replace('.php', '');

//         // Add the class to the body element
//         $('body').addClass('page_' + className);
//          // Add Right Sidebar into menu

//     });

//        var windowsize = jQuery(window).width();
//         if (windowsize < 992) {
//             $(".right_menu").insertAfter('header .navbar-collapse .navbar-nav  .nav-item:last-child');
//             $('.navbar-brand').clone(true).appendTo('header .navbar-collapse ul.navbar-nav');

//         };
//           if (windowsize < 500) {
//   jQuery('.img_row ').owlCarousel({
//             items:-1,
//             loop:false,
//             nav:false,
//             dots:false,
//             margin:20,
//             autoplay:false,
//             responsive: {
//             0: {
//                 items: 1,
//             },
//             600: {
//                 items: 1
//             }
//             }

//         });
//           }

//    View Upbtn on scroll
//   document.addEventListener('scroll', function() {
//         var scrollDiv = document.querySelector('.up_btn');
//         if (window.scrollY > 100) { // Change 100 to your desired scroll position
//             scrollDiv.style.opacity = '1';
//         } else {
//             scrollDiv.style.opacity = '0';
//         }
//     });

$(document).ready(function () {
    var pathname = window.location.pathname;

    //         // Extract the last part of the pathname as the class name
    var className = pathname.substring(pathname.lastIndexOf('/') + 1).replace('.php', '');
    $("body").addClass("page_" + className);
});
jQuery(document).ready(function () {
    jQuery(".rising_telent_row ").owlCarousel({
        items: -1,
        loop: true,
        nav: false,
        dots: false,
        margin: 50,
        // stagePadding:50,
        autoplay: false,
        navText: [
            "<i class='fa-solid fa-arrow-left'></i> ",
            "<i class='fa-solid fa-arrow-right'></i>",
        ],
        responsive: {
            0: {
                items: 1,
            },
            500: {
                items: 2,
            },
            800: {
                items: 3,
            },
            1200: {
                items: 3.5,
            },
            1366: {
                items: 3.5,
            },
        },
    });
    jQuery(".recomended_blogs ").owlCarousel({
        items: -1,
        loop: true,
        nav: false,
        dots: false,
        margin: 20,
        // stagePadding:50,
        autoplay: false,
        navText: [
            "<i class='fa-solid fa-arrow-left'></i> ",
            "<i class='fa-solid fa-arrow-right'></i>",
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            },
            1200: {
                items: 3.5,
            },
            1366: {
                items: 3.5,
            },
        },
    });
});





jQuery(document).ready(function(){
    jQuery('#clos__menu').click(function(){
        jQuery("#header #navbarSupportedContent").removeClass('show');
    });


    windowsize = jQuery(window).width();
    if (windowsize <= 1199) {
        jQuery("#clos__menu").insertBefore('#header #navbarSupportedContent .navbar-nav');
        jQuery("#header .right_menu").insertAfter('#header #navbarSupportedContent .navbar-nav > li:last-child');
        jQuery(".navbar-brand").clone().appendTo("#header #navbarSupportedContent");
    }


    // Range Slider Query
    var rangeSlider = function(){
        var slider = jQuery('.range-slider'),
            range = jQuery('.range-slider__range'),
            value = jQuery('.side_range_slide .range-slider .range_cont div  .range-slider__value');

        slider.each(function(){

            value.each(function(){
                var value = jQuery(this).prev().attr('value');
                jQuery(this).html(value);
            });

            range.on('input', function(){
                jQuery(this).next(value).html(this.value);
            });
        });
    };

    rangeSlider();
});
