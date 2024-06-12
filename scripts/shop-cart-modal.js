// Get the modal
var cart_modal = document.getElementById("myCart");

// Get the <span> element that closes the modal
var cart_span = document.getElementsByClassName("close")[1];

// When the user clicks the button, open the modal 
// btn.onclick = function() {
//     cart_modal.style.display = "block";
// }

// When the user clicks on <span> (x), close the modal
cart_span.onclick = function() {
    cart_modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it

    // window.onclick = function(event) {
    // if (event.target == cart_modal) {
    //     cart_modal.style.display = "none";
    // }
    
// }

function loadCartData() {
    // Fetch cart data from the server using AJAX
    fetch('process-cart-items.php', {
        method: 'POST',
        body: JSON.stringify({ userID: user_ID }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.text())
    .then(data => {
        // Display the fetched data in the cart container
        document.getElementById('cart-screen').innerHTML = data;
        // document.getElementById('details-right').innerHTML = data;
        // document.getElementById('cart-details').innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Call the function to load cart data when the page loads
loadCartData();