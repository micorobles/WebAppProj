<?php
    session_start();
    require("config.php");
?>

<?php

if (isset($_POST["registration"])) {
    $fname = $_POST["firstName"];
    $lname = $_POST["lastName"];
    $age = $_POST["age"];
    $uname = $_POST["userName"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $prompt = "";
    $pwdValidate = '0';

    if ($password != $confirmPassword){
        
        echo '<script>alert("Password did not match.");</script>';
        echo '<script>setTimeout(function() { window.location.href = "signUp.php"; }, );</script>';
        // $prompt = "error1";
        // header("Location: signUp.php");
      

    } else {
        // require("config.php");
        $sql = "INSERT INTO tbl_users(firstName, lastName, age, username, passcode) 
                VALUES('".$fname."' ,'".$lname."' ,'".$age."' ,'".$uname."','".$password."')";
        mysqli_query($connect, $sql);
        echo '<script>alert("Account Created!");</script>';
        echo '<script>setTimeout(function() { window.location.href = "login.php"; }, );</script>';
    }
}

elseif (isset($_POST["login"])) {
    
    $username = $_POST["userName"];
    $password = $_POST["password"];

    $response = "";
    $sql = "SELECT * FROM tbl_users where username='$username' AND passcode='$password'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result)>=1){
    //    header("Location: otp.php?name=$username");
    $object = mysqli_fetch_assoc($result);
        $_SESSION['userID'] = $object['id'];
        $_SESSION['FirstName'] = $object['firstName'];
        $_SESSION['LastName'] = $object['lastName'];
        $_SESSION['Age'] = $object['age'];
        $_SESSION['response'] = "success";
        header("Location: login.php ");

    } else{
        // echo '<script>alert("Account does not exists.");</script>';
        $_SESSION['response'] = "error";
        header("Location: login.php ");
    } 
    
} 

elseif (isset($_POST['add_collection']) && isset($_FILES['image_front']) && isset($_FILES['image_back'])) {

    $cName = $_POST["name"];
    $cPrice = $_POST["price"];
    $errors = [];
    $validImageExtension = ['jpg', 'jpeg', 'png'];

    if($_FILES['image_front']['error'] === 4){
        // echo '<script> alert("Image Does Not Exist"); </script>';
        $errors = "Image Does Not Exist";
    } else {
        $imgFrontName = $_FILES['image_front']['name'];
        $imgFrontSize = $_FILES['image_front']['size'];
        $imgFronttmpName = $_FILES['image_front']['tmp_name'];

        
        $imgFrontImageExtension = explode('.', $imgFrontName);
        // $imageExtension = pathinfo($FileName, PATHINFO_EXTENSION);
        $imgFrontImageExtension = strtolower(end($imgFrontImageExtension));

        if(!in_array($imgFrontImageExtension, $validImageExtension)){
            // echo '<script> alert("Invalid Image Extension."); </script>';
            $errors = "Invalid Image Extension";
            header("Location: ADMIN.php");
        } elseif ($imgFrontSize > 1000000000){
            // echo '<script> alert("Image Size is Too Large"); </script>';
            $errors = "Image Size is Too Large";
            header("Location: ADMIN.php");
        } else {
            $newImageFrontName = uniqid();
            $newImageFrontName .= '.' . $imgFrontImageExtension;
            move_uploaded_file($imgFronttmpName, '../uploads/Front/' . $newImageFrontName);
        }   
    }

    if($_FILES['image_back']['error'] === 4){
        // echo '<script> alert("Image Does Not Exist"); </script>';
        $errors = "Image Does Not Exist";
    } else {
        $imgBackName = $_FILES['image_back']['name'];
        $imgBackSize = $_FILES['image_back']['size'];
        $imgBacktmpName = $_FILES['image_back']['tmp_name'];

        $imgBackImageExtension = explode('.', $imgBackName);
        // $imageExtension = pathinfo($FileName, PATHINFO_EXTENSION);
        $imgBackImageExtension = strtolower(end($imgBackImageExtension));

        if(!in_array($imgBackImageExtension, $validImageExtension)){
            // echo '<script> alert("Invalid Image Extension."); </script>';
            $errors = "Invalid Image Extension";
            header("Location: ADMIN.php");
        } elseif ($imgBackSize > 1000000000){
            // echo '<script> alert("Image Size is Too Large"); </script>';
            $errors = "Image Size is Too Large";
            header("Location: ADMIN.php");
        } else {
            $newImageBackName = uniqid();
            $newImageBackName .= '.' . $imgBackImageExtension;
            move_uploaded_file($imgBacktmpName, '../uploads/Back/' . $newImageBackName);
        }   
   
    }
        // Check if there were any errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<script> alert("' . $error . '"); </script>';
        }
        header("Location: ADMIN.php");
    } else {
        // Insert data into the database with the two image file names ($newImageFrontName and $newImageBackName)
        $sql = "INSERT INTO tbl_collection(collName, collPrice, imageFront, imageBack) VALUES 
                ('".$cName."' ,'".$cPrice."' ,'".$newImageFrontName."','".$newImageBackName."')";
        $result = mysqli_query($connect, $sql);

        echo '<script> alert("Successfully Added"); </script>';
        header("Location: ADMIN.php");
        }
    
} 

else {
    echo ("X");
}

?>