<?php
    session_start();
    require_once("config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDC Clothing Store</title>

    <link rel="stylesheet" href="../css/style-login.css">
    <link rel="stylesheet" href="../plugins/iziToast/dist/css/iziToast.min.css">
</head>

<body>  
    <div class="parent">    
        <div class="logo">

            <img src="../img/LOGO_WEB.png" alt="Logo">    
        </div>
        <div class="main">            
            <div class="content">
                <form method="post" action="process.php">   
                    <table>
                        <thead>
                            <h1>Login Security</h1>
                        </thead>
                        <tbody>
                            <hr>
                            <tr>
                                <td>Username:</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="userName" class="textField" required></td>           
                            </tr>

                            <tr>
                                <td>Password:</td>                
                            </tr>
                            <tr>
                                <td><input type="password" name="password" class="textField" required></td>                        
                            </tr>                    
                            
                            <tr>        
                                <td class="btnLogContainer"><input type="submit" name="login" value="Login" class="buttonSubmit"></td>                      
                            </tr>
                            <tr>
                                <td>
                                    <div id="divider">OR</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <div class="bottom">
                    <input type="button" value="Create Account" id="btnReg"></input>
                </div>
            </div>
        </div>        
    </div> 

    
        
    <?php

        if (isset($_SESSION['response'])) {
            $response = $_SESSION['response'];
            $fname = $_SESSION['FirstName'];
        } else {
            $response = '';
            $fname = '';
        }
    ?>

    <script>
        var response = <?php echo json_encode($response); ?>;
        var fname = <?php echo json_encode($fname); ?>;
    </script>

    <script src="../plugins/iziToast/dist/js/iziToast.min.js" ></script>       
    <script src="../scripts/login.js"></script>

    <?php
        unset($_SESSION['response']);
    ?>
</body>
</html>