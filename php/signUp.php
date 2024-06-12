

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDC Clothing Store</title>

    <link rel="stylesheet" href="../css/style-signUp.css">
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
                            <h1>Create Account</h1>
                        </thead>
                        <tbody>
                            <hr>
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" name="firstName" class="textField" required></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" name="lastName" class="textField" required></td>
                            </tr>
                            <tr>
                                <td>Age:</td>
                                <td><input type="text" name="age" class="textField" required></td>
                            </tr>
                            <tr>
                                <td>Username:</td>
                                <td><input type="text" name="userName" class="textField" required></td>
                            </tr>
                            <tr>
                                <td>Password:</td>    
                                <td><input type="text" name="password" class="textField" required></td>             
                            </tr>         
                            <tr>
                                <td>Confirm Password:</td>    
                                <td><input type="text" name="confirmPassword" class="textField" required></td>             
                            </tr>                                               
                            <tr>        
                                <td colspan="2"><input type="submit" name="registration" value="Create" class="buttonSubmit"></td>                      
                            </tr>
                          
                        </tbody>
                    </table>
                </form>
                
            </div>
        </div>        
    </div>      


    <script src="../plugins/iziToast/dist/js/iziToast.min.js" ></script>    
    <script src="../scripts/signUp.js"></script>
    
</body>
</html>