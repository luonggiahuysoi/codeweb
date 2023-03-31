<div id="content">
    <div id="video">
        <video height="300px" controls autoplay>
            <source src="./img_luonggiahuy/1.mp4" type="video/mp4">
        </video>
    </div>
</div>
<hr>
<div id="menu">
    No ajax <br>
    <a href="index.php?page=page01">Page01</a>
    <a href="index.php?page=page02">Page02</a>
    <a href="index.php?page=page03">Page03</a>
    <a href="index.php?page=page04">Page04</a>
    <hr>
    Use ajax <br>
    <b class="linkmenu" value ="page01">Page 01</b>
    <b class="linkmenu" value ="page02">Page 02</b>
    <b class="linkmenu" value ="page03">Page 03</b>
    <b class="linkmenu" value ="page04">Page 04</b>
    <hr>
</div>
<hr>
<div id="getcontent">
    <?php
        if (isset($_GET["page"])) {
            $page= $_GET["page"];
                include './pageJS'.$page.'.php';
        } else {
            echo "Nothing to show!";
        }
    ?>
</div>