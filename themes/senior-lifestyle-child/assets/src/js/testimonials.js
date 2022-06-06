/*
var slideIndex = 1;
function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (slides.length > 0) {
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
}
document.addEventListener("DOMContentLoaded", function () {
    showSlides(slideIndex);
});
*/

if(document.URL.indexOf("covid-19") >= 0){ 
    jQuery('.testimonials').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        adaptiveHeight: true,
        infinite: true,
        autoplay: false,
        autoplaySpeed: 5000	
    });
}

jQuery('.testimonials').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
	dots: true,
	adaptiveHeight: true,
	infinite: true,
	autoplay: false,
	autoplaySpeed: 5000	
});