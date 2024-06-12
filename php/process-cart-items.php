<?php
require("config.php");

// Include your database connection or configuration here
$userID = json_decode(file_get_contents('php://input'))->userID;
$sql = "SELECT * FROM tbl_users_cart WHERE userID = '$userID'";
$result = mysqli_query($connect, $sql);

if (!$result) {
    echo "Query Error: " . mysqli_error($connect);
} else {
    // Initialize an empty string to store the HTML content
    $cartHTML = '';
    // $footerHTML = '';
    // $orderTotal = 0;
    $orderTotal = 0;
    if (mysqli_num_rows($result) > 0) {
        while ($obj = mysqli_fetch_assoc($result)) {
            $orderTotal = $orderTotal + $obj['orderTotal'];

            // Generate HTML for each cart item
            $cartHTML .= '<div class="cart-item">';
            $cartHTML .= '<div class="cart-item-total"> Amount: &#8369 '.$obj['orderTotal'].' ';
            $cartHTML .= '</div>';
            $cartHTML .= '<div class="cart-item-photo">';
            $cartHTML .= '<img src="' . $obj['orderImgFront'] . '" class="cart-item-image-front" id="imgFront">';
            $cartHTML .= '<img src="' . $obj['orderImgBack'] . '" class="cart-item-image-back" id="imgBack">';
            $cartHTML .= '</div>';
            $cartHTML .= '<div class="cart-item-info">';
            $cartHTML .= '<div class="cart-info-name">';
            $cartHTML .= '<span class="cart-txtName"><b>' . $obj['orderName'] . '</b></span>';
            $cartHTML .= '</div>';
            $cartHTML .= '<div class="cart-info-price">';
            $cartHTML .= '<span class="cart-txtPrice"> &#8369 ' . $obj['orderPrice'] . '</span>';
            $cartHTML .= '</div>';
            $cartHTML .= '</div>';
            $cartHTML .= '<div class="cart-item-qty">';
            $cartHTML .= '<div class="cart-qty-minus">&minus;</div>';
            $cartHTML .= '<input type="text" name="quantity" class="cart-qty-txtQTY" value="' . $obj['orderQuantity'] . '" disabled>';
            $cartHTML .= '<div class="cart-qty-plus">&plus;</div>';
            $cartHTML .= '</div>';
            $cartHTML .= '<span class="close">&times;</span>';
            $cartHTML .= '</div>';
        }

            // $footerHTML .= '<div class="details-left"></div>';
            // $footerHTML .= '<div class="details-right">Total Amount: &#8369 '. $orderTotal .'</div>';
    }

    // Echo the HTML content for the cart items
    echo $cartHTML;

    echo '<div id="cart-details">'   ;
    echo '<div class="details-left"></div>';
    echo '<div id="details-right">Total Amount: &#8369  '.$orderTotal.' </div>';
    echo '</div>';
    // echo $footerHTML;
}
?>

