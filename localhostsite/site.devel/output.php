<?php
    $servername = "localhost";
    $username = "root";
    $db_password = "root";
    $db = 'feedbackForm';
    $link = mysqli_connect($servername, $username, $db_password, $db);
    $activePage = 1;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST["turnPages"])) {
            if(isset($_POST["turnPages"])){$maxRowsOut = strip_tags($_POST["turnPages"]);}
        }
    } else {
        $maxRowsOut = 3;
    }
    if (!$link) {
        die("Connection to DB is failed!" . mysqli_connect_error());
    } else {
        $result = mysqli_query($link, "SELECT * FROM customer_reviews");
        $total_records = mysqli_num_rows($result);
    }
    $pages = ceil($total_records/$maxRowsOut);
    if (isset($_GET["page"])) {
        $inputPage = $_GET["page"];
        if (($inputPage > 0) & ($inputPage <= $pages)) {
            $activePage = $inputPage;
        }
    }
    $start_from = ($activePage - 1) * $maxRowsOut;
    
    if (!$link) {
        die("Connection to DB is failed!" . mysqli_connect_error());
    } else {
        $outData = $link->query( query: "SELECT * FROM customer_reviews LIMIT $start_from, $maxRowsOut");
    }
require 'output.html';
exit;
?>