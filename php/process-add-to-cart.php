<?php
    session_start();
    require("config.php");
?>

<?php

    $userID = $_SESSION['userID'];
    $data  = json_decode(file_get_contents("php://input"));

    if ($data === null) {
        echo json_encode(array("success" => false, "message" => "Invalid JSON data"));
        exit; // Exit the script to prevent further execution
    }

    // Check if the expected properties exist in the JSON data
    if (!isset($data->imgFrontSrc) ||
        !isset($data->imgBackSrc) ||
        !isset($data->txtName) ||
        !isset($data->txtPrice) ||
        !isset($data->quantity) ||
        !isset($data->computedAmount)) {
        echo json_encode(array("success" => false, "message" => "Missing properties in JSON data"));
        exit; // Exit the script to prevent further execution
    }

    $imgFrontSrc = $data->imgFrontSrc;
    $imgBackSrc = $data->imgBackSrc;
    $txtName = $data->txtName;
    $txtPrice = $data->txtPrice;
    $quantity = $data->quantity;
    $computedAmount = $data->computedAmount;

    $sql = "INSERT INTO tbl_users_cart (userID, orderImgFront, orderImgBack, orderName, orderPrice, orderQuantity, orderTotal)
            VALUES ('$userID', '$imgFrontSrc', '$imgBackSrc', '$txtName', '$txtPrice', '$quantity', '$computedAmount')";

    if ($connect->query($sql) === TRUE) {
        echo json_encode(array("success" => true, "message" => "Data inserted successfully"));
        // echo json_encode(array("message" => " $userID , $imgBackSrc , $txtName , $txtPrice , $quantity , $computedAmount  "));
    } else {
        echo json_encode(array("success" => false,"message" => "Error: " . $sql . " - " . $connect->error));
    }

    mysqli_close($connect);
?>