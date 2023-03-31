<!-- ------- training3 bổ sung đầu trang----- -->
<?php
    session_start();
?>
<!-- ---------------- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='./img_luonggiahuy/huydeptrai.jpg' />
    <title>Wed của Lương Gia Huy</title>
    <link rel="stylesheet" href="./stylecss_luonggiahuy/mycss.css">
    <script src="./js_luonggiahuy/jquery-3.6.3.min.js"></script>
    <script src="./js_luonggiahuy/jscript.js"></script>
</head>
<body>
    <!-- --------- Bổ sung đầu trang trainning3 body login ----- -->
    <?php
        if (!isset($_SESSION['USER']) and !isset($_SESSION['ADMIN'])) {
            header('location:userLogin.php');

        }
    ?>

    <!-- --------------------- -->
    <div class = "container">
        <div class = "item item1">header</div>
        <div class = "item item2">
            <?php require './elements_luonggiahuy/left.php';?>
        </div>
        <div class = "item item3">
         
            <?php require './elements_luonggiahuy/mUser/center.php';?>
            <?php require './elements_luonggiahuy/right.php';?>

        </div>
        <div class = "item item4">footer</div>
        <div id="signnoutbutton">
            <a href="elements_luonggiahuy/mUser/userAct.php?reqact=userlogout">
                <img src="img_luonggiahuy/logout.png" class="iconbutton">
            </a>
        </div>
    </div> 
</body>
</html>