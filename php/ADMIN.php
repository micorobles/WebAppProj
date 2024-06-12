<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Collections</title>
    <link rel="stylesheet" href="../css/style-ADMIN.css">
</head>
<body>


    <div class="back"><a href="homepage.php">Back</a></div>
    <div class="add-form-container">
        <form action="process.php" method="post" enctype="multipart/form-data">
            <table>
                    <thead>
                        <h1>Add Collection</h1>
                    </thead>
                    <tbody>
                        <hr>
                        <tr>
                            <td>Collection Name:</td>
                            <td><input type="text" name="name" id="name" class="textField" required></td>
                        </tr>
                        <tr>
                            <td>Collection Price: </td>
                            <td><input type="text" name="price" id="price" class="textField" required></td>
                        </tr>
                        <tr>
                            <td>Collection Image (front): </td>
                            <td><input type="file" name="image_front" id="image_front" accept=".jpg, .jpeg, .png" value=""></td>
                        </tr>       
                        <tr>
                            <td>Collection Image (back): </td>
                            <td><input type="file" name="image_back" id="image_back" accept=".jpg, .jpeg, .png" value=""></td>
                        </tr>                                        
                        <tr>        
                            <td colspan="2"><button type="submit" name="add_collection" class="buttonSubmit">Add</button></td>                      
                        </tr>
                        
                    </tbody>
                </table>    
        </form>
    </div>

</body>
</html>