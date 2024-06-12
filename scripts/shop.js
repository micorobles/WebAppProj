document.addEventListener('DOMContentLoaded', function () {
  // cart_modal.style.display = "block";

  var merchContainer = document.querySelectorAll(".content-items");
  var merchImages = document.querySelectorAll(".merchImage");
  var btncart = document.querySelector("#Cart");
  
  btncart.onclick = function(){
    cart_modal.style.display = "block";
    loadCartData();
  }

  merchContainer.forEach(function(content_items, index) {
      
    var merchImage = merchImages[index];
    originalImageURL = merchImage.getAttribute("src");
    
    var merchName = content_items.querySelector(".merchName");
    var merchPrice = content_items.querySelector(".merchPrice");
    var addToCart = content_items.querySelector(".add-to-cart");

    var originalImageURL;
    var hoverImageURL;

    content_items.addEventListener("mouseover", function() {
        hoverImageURL = merchImage.getAttribute("data-hover-image");
        merchImage.src = hoverImageURL;
        merchName.style.display = "none";
        merchPrice.style.display = "none";
        if (addToCart) {
          addToCart.style.display = "flex";

          addToCart.onclick = function() {
            modal.style.display = "block";            
            showOrder(originalImageURL, hoverImageURL, merchName, merchPrice);
          }
        }
    });

    content_items.addEventListener("mouseout", function() {
          // Set the original image URL
        merchImage.src = originalImageURL;
        merchName.style.display = "block";
        merchPrice.style.display = "block";
        if (addToCart) {
            addToCart.style.display = "none";
        }
    });
  });
});