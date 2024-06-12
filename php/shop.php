<?php
    session_start();
    require("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
    <link rel="stylesheet" href="../plugins/iziToast/dist/css/iziToast.min.css">
    <link rel="stylesheet" href="../css/style-shop.css">
    <link rel="stylesheet" href="../css/style-shop-modal.css">
    <link rel="stylesheet" href="../css/style-shop-cart-modal.css">
</head>
<body>

    <div class="shop-header">
        <div class="header-promotion">Buy 1 get 100 Clothes at discount of 1% - SHOP NOW!!!</div>
        <div class="header-title">
            <div class="header-title-left"></div>
            <div class="header-title-center">BDC Collections</div>
            <div class="header-title-right"><img src="../img/HEADER-CART-SYMBOL.png" id="Cart"></div>
        </div>
    </div>
    
    <div class="shop-content">

        <?php
            $sql = "SELECT * FROM tbl_collection ORDER BY id ASC";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($obj = mysqli_fetch_assoc($result)) {  ?>

                    <div class="content-items">
                        <div class="content-items-merch">
                            <img src="../uploads/Front/<?=$obj['imageFront']?>" alt="<?=$obj['collName']?>" class="merchImage" data-hover-image="../uploads/Back/<?=$obj['imageBack']?>">
                        </div>   
                        <div class="content-items-details">
                            <div class="add-to-cart" id="btnModalCart">
                                + Add to cart
                            </div>
                            <ul>
                                <li class="merchName"><?=$obj['collName']?></li>
                                <li class="merchPrice">&#8369 <?=$obj['collPrice']?></li>
                            </ul>
                        </div>
                    </div> 
        <?php   }
            } ?>

           <!-- The Modal -->
           <div class="modal" id="myModal">

                <!-- Modal content  -->
                
                <div class="modal-container">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-content">
                        <!-- <form method="POST" action="process.php">  -->
                            <div class="content-item">
                                <div class="item-photo">
                                    <img src="" class="item-image-front" id="imgFront" >
                                    <img src="" class="item-image-back" id="imgBack" >
                                </div>
                                <div class="item-info">
                                    <div class="info-name">
                                        <span class="txtName" ><b></b></span> 
                                    </div> 
                                    <div class="info-price">
                                        <span class="txtPrice" ></span> 
                                    </div>
                                </div>
                                <div class="item-qty">
                                    <div class="qty-minus">&minus;</div>
                                    <input type="text" name="quantity" class="qty-txtQTY" disabled>
                                    <div class="qty-plus">&plus;</div>
                                </div>
                            </div>

                            <div class="content-details">
                                <div class="details-voucher"></div>
                                <div class="details-amount">
                                    <div class="amount-total">
                                        <span> <b>Total: &nbsp;</b></span>
                                        <span class="computedAmount">  </span>
                                    </div>
                                    <div class="amount-button">
                                        <input type="submit" name="add_item" class="button-add" value="Add to cart">
                                    </div>
                                </div>
                            </div>
                        <!-- </form> -->
                    </div>
                    
                </div>

            </div> 
      
            <div class="cartModal" id="myCart">
            <!-- Modal content -->
                <div class="cart-container">
                    <div class="cart-header">
                        BDC Cart
                        <span class="close">&times;</span>
                    </div>
                    <div class="cart-content">

                    <!-- removed some div's look in sublime -->
                        <div id="cart-screen">

                        </div>                       
                    </div>
                        <!-- <div id="cart-details">
                            <div class="details-left"></div>
                

                        </div> -->
                </div>
            </div>
        
    </div>
     
    <script>
        var user_ID = <?php echo $_SESSION['userID']; ?>;
    </script>
    
    <script src="../plugins/iziToast/dist/js/iziToast.min.js" ></script>    
    <script src="../scripts/shop.js"></script>
    <script src="../scripts/shop-modal.js"></script>
    <script src="../scripts/shop-cart-modal.js"></script>

   

</body>
</html>