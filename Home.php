<?php
    if(isset($_GET['idbaiviet']))
    {
        include 'showbaiviet.php';
    }
    else {
        include 'tatcatin.php';
    }
?>
