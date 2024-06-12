 
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}

document.addEventListener('DOMContentLoaded', function () {
  // Get a reference to the button element
      iziToast.info({ 
      title: "Welcome", 
      message: "Hello "+fname+"!", 
      position: "topCenter", 
      timeout: 2000,
    }); 

    var header_option_shop = document.getElementById("shop");
    var header_option_cart = document.getElementById("cart");
    var header_option_add_collections = document.getElementById("add-collections");

    if (fname === "admin") {
      header_option_shop.style.display = "none";
      header_option_cart.style.display = "none";
      header_option_add_collections.style.display = "block";
    }
    

});