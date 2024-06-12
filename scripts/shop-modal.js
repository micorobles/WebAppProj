

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var addToCart = document.getElementById("btnModalCart");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var selected_merchName = modal.querySelector(".txtName");
    var selected_merchPrice = modal.querySelector(".txtPrice");
    var selected_imgFront = modal.querySelector("#imgFront");
    var selected_imgBack = modal.querySelector("#imgBack");
    var selected_quantity = modal.querySelector(".qty-txtQTY");
    var btnMinus = modal.querySelector(".qty-minus");
    var btnPlus = modal.querySelector(".qty-plus");
    var computation = modal.querySelector(".computedAmount");
    var content = modal.querySelector(".content-item");
    var modalContent = modal.querySelector(".modal-content");
    var btnAddItem = modal.querySelector(".amount-button");
    var detailsVoucher = modal.querySelector(".details-voucher");
    var detailsAmount = modal.querySelector(".details-amount");
    var selected_merchPriceValue;

    function showOrder(originalImageURL, hoverImageURL, merchName, merchPrice){
        
        selected_imgFront.src = originalImageURL;
        selected_imgBack.src = hoverImageURL;
        selected_merchName.textContent = merchName.textContent;
        selected_merchPrice.textContent = merchPrice.textContent;        

        var qtyValue = 1;
        selected_merchPriceValue = parseFloat(selected_merchPrice.textContent.replace(/[^\d.]/g, ''));
        computation.textContent = String.fromCharCode(8369)+" "+selected_merchPriceValue;
        

        selectQuantity(qtyValue, selected_merchPriceValue)
        fetchData();

    }

    function selectQuantity(qtyValue, selected_merchPriceValue){
        selected_quantity.value = qtyValue;
        // var orig = content.innerHTML;
        btnPlus.onclick = function(){
            qtyValue = qtyValue +1;
            selected_quantity.value = qtyValue;
            var qtySum = selected_merchPriceValue * qtyValue;
            computation.textContent = String.fromCharCode(8369)+" "+qtySum;
        }
        btnMinus.onclick = function(){
            qtyValue = qtyValue -1;
            selected_quantity.value = qtyValue;
            var qtySum = selected_merchPriceValue * qtyValue;
            computation.textContent = String.fromCharCode(8369)+" "+qtySum;

            if (qtyValue == 0){
                
                detailsVoucher.textContent = "Empty.";
                content.style.display = "none";
                detailsAmount.style.display = "none";
            } 
        }

        detailsVoucher.textContent = "";
        content.style.display = "flex";
        detailsAmount.style.display ="block";
    }

    function fetchData(){

        btnAddItem.onclick = function(){

            var selected_total = parseFloat(computation.textContent.replace(/[^\d.]/g, ''));
            // alert("imgFront: "+selected_imgFront.src+" | imgBack: "+selected_imgBack.src+" | name: "+selected_merchName.textContent+" | price: "+selected_merchPriceValue+" | quantity: "+selected_quantity.value+" | computation: "+selected_total);

            // Send data to a server-side script (e.g., process.php)
            fetch("process-add-to-cart.php", {
                method: "POST",
                headers: {
                "Content-Type": "application/json",
                },
                body: JSON.stringify({
                imgFrontSrc: selected_imgFront.src,
                imgBackSrc: selected_imgBack.src,
                txtName: selected_merchName.textContent,
                txtPrice: selected_merchPriceValue,
                quantity: selected_quantity.value,
                computedAmount: selected_total,
                }),
            })
                .then((response) => {
                    if (!response.ok) {
                        console.log(response);
                        throw new Error('Network response was not ok');
                      }
                    return response.json();
                })
                .then((data) => {
                console.log("Data sent to server:", data);
                // Handle any response from the server if needed
                if (data.success){
                    iziToast.success({ 
                        title: "Success", 
                        message: "Merch added to cart.", 
                        position: "topCenter", 
                        timeout: 2000,
                        
                    }); 
                        // alert(data.success);                        
                        modal.style.display = "none";
                } else {
                    iziToast.error({ 
                        title: "Error", 
                        message: "Error adding merch to cart. "+data.message, 
                        position: "topCenter", 
                        timeout: 2000,
                    }); 
                }
                })
                .catch((error) => {
                console.error("Error: ", error);
                });
        }
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }

