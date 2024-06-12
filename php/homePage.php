<?php
    session_start();
    include("header.php");
    require("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDC Clothing Store</title>
    <link rel="stylesheet" href="../css/style-homePage.css">
    <link rel="stylesheet" href="../plugins/iziToast/dist/css/iziToast.min.css">
</head>
<body>

<div class="parent">
    <!-- Container for the image gallery -->
    <div class="slide-container">

        <?php
        $sql = "SELECT * FROM tbl_collection ORDER BY id ASC ";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Initialize slide count outside the loop
            $slideCount = 1;

            while ($obj = mysqli_fetch_assoc($result)) {  ?>
                <div class="mySlides">
                    <div class="numbertext"><?= $slideCount ?> / <?= mysqli_num_rows($result) ?></div>
                    <img src="../uploads/Front/<?= $obj['imageFront'] ?>" style="width:50%; height:440px">
                </div>

                <!-- Increment slide count for each iteration of the loop -->
                <?php $slideCount++; ?>
            <?php }
        }
        mysqli_close($connect);
        ?>


        <!-- Move these elements outside of the loop -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <div class="row">
            <!-- Add your image thumbnails here if needed -->
            <?php
    // This part can be added back inside the loop if you want to display image thumbnails
        if (mysqli_num_rows($result) > 0) {
            mysqli_data_seek($result, 0); // Reset the result set pointer
            while ($obj = mysqli_fetch_assoc($result)) {  ?>
                <div class="column">
                    <img class="demo cursor" src="../uploads/Front/<?= $obj['imageFront'] ?>" style="width:50%" onclick="currentSlide(<?= $slideCount - 1 ?>)" alt="<?= $obj['collName'] ?>">
                </div>
            <?php }
        }
    ?>
        </div>
    </div>
</div>
        <!-- Full-width images with number text -->
        <!-- <div class="mySlides">
            <div class="numbertext">1 / 6</div>
            <img src="../img/LOGO_WEB.png" style="width:50%; height:440px">
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 6</div>
            <img src="../img/logo.jpg" style="width:50%; height:440px">
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 6</div>
            <img src="../img/logo.jpg" style="width:50%; height:440px">
        </div>

        <div class="mySlides">
            <div class="numbertext">4 / 6</div>
            <img src="../img/logo.jpg" style="width:50%; height:440px">
        </div>

        <div class="mySlides">
            <div class="numbertext">5 / 6</div>
            <img src="../img/logo.jpg" style="width:50%; height:440px">
        </div>

        <div class="mySlides">
            <div class="numbertext">6 / 6</div>
            <img src="../img/logo.jpg" style="width:50%; height:440px">
        </div> -->

        <!-- Next and previous buttons -->
        <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a> -->

    <!-- Image text -->
        <!-- <div class="caption-container">
        <p id="caption"></p>
        </div> -->

    <!-- Thumbnail images -->
        <!-- <div class="row">
            <div class="column">
                <img class="demo cursor" src="../img/LOGO_WEB.png" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
            </div> -->
            <!-- <div class="column">
                <img class="demo cursor" src="../img/logo.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
            </div>
            <div class="column">
                <img class="demo cursor" src="../img/logo.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
            </div>
            <div class="column">
                <img class="demo cursor" src="../img/logo.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
            </div>
            <div class="column">
                <img class="demo cursor" src="../img/logo.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
            </div>
            <div class="column">
                <img class="demo cursor" src="../img/logo.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
            </div>
        </div>
    </div>
</div> -->

<?php
    $fname = $_SESSION['FirstName'];
?>

<script>
    var fname = <?php echo json_encode($fname); ?>;
</script>

<script src="../plugins/iziToast/dist/js/iziToast.min.js" ></script>   
<script src="../scripts/homePage.js"></script>
</body>
</html>