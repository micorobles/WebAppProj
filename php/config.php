<?php  
    $servername = "localhost";  
    $dbName = "db_clothing";
    $user = "root";  
    $pass = "";  

    $connect = mysqli_connect($servername,$user,$pass,$dbName);  

    if (!$connect){
        echo '<script>alert("Failed Connection");</script>';
    } else {
        // echo '<script>alert("Connected Successfully");</script>';
        createTblUsers($connect);        
        createTblCollection($connect);
        createTblUsers_Cart($connect);
    }

    function createTblUsers($connect){
        // Define the SQL query to create the table
        $tablename = "tbl_users";
        $checker = $connect->query("SHOW TABLES LIKE '$tablename' ");

        if ($checker->num_rows === 0){    
            $sql = "CREATE TABLE IF NOT EXISTS tbl_users (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstName VARCHAR(30) NOT NULL,
                lastName VARCHAR(30) NOT NULL,
                age INT(3) NOT NULL,
                username VARCHAR(50) NOT NULL,
                passcode VARCHAR(50) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        
        // Execute the SQL query to create the table
            if ($connect->query($sql) === TRUE) {
                // echo '<script>alert("Table Created.");</script>';
            } else {
                echo '<script>alert("Error Creating Table:  ' . $connect->error . '");</script>';
            }

        } else {
            // echo '<script>alert("Table already exists.");</script>';
        }
    }

    function createTblCollection($connect){
        // Define the SQL query to create the table
        $tablename = "tbl_collection";
        $checker = $connect->query("SHOW TABLES LIKE '$tablename' ");

        if ($checker->num_rows === 0){    
            $sql = "CREATE TABLE IF NOT EXISTS tbl_collection (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                collName VARCHAR(50) NOT NULL,
                collPrice NUMERIC(11) NOT NULL,
                imageFront VARCHAR(60)NOT NULL,
                imageBack VARCHAR(60)NOT NULL,
                added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        
        // Execute the SQL query to create the table
            if ($connect->query($sql) === TRUE) {
                // echo '<script>alert("Table Created.");</script>';
            } else {
                echo '<script>alert("Error Creating Table:  ' . $connect->error . '");</script>';
            }

        } else {
            // echo '<script>alert("Table already exists.");</script>';
        }
    }

    function createTblUsers_Cart($connect){
        // Define the SQL query to create the table
        $tablename = "tbl_users_cart";
        $checker = $connect->query("SHOW TABLES LIKE '$tablename' ");

        if ($checker->num_rows === 0){    
            $sql = "CREATE TABLE IF NOT EXISTS tbl_users_cart (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                userID INT(6) UNSIGNED NOT NULL,
                orderImgFront VARCHAR(60) NOT NULL,
                orderImgBack VARCHAR(60) NOT NULL,
                orderName VARCHAR(50) NOT NULL,
                orderPrice NUMERIC(11) NOT NULL,
                orderQuantity INT (6) NOT NULL, 
                orderTotal NUMERIC(11) NOT NULL, 
                added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (userID) REFERENCES tbl_users(id)
        )";
        
        // Execute the SQL query to create the table
            if ($connect->query($sql) === TRUE) {
                // echo '<script>alert("Table Created.");</script>';
            } else {
                echo '<script>alert("Error Creating Table:  ' . $connect->error . '");</script>';
            }

        } else {
            // echo '<script>alert("Table already exists.");</script>';
        }
    }
?>  