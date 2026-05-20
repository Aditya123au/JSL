<?php 
include('config.php');
include('check_session.php');
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern <?php echo ucfirst(str_replace('.php', '', $currentPage)); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet preload" as="style">
    <link rel="stylesheet" href="css/common.css">
    <?php
        if($currentPage === 'dashboard.php'){
    ?>
            <link rel="stylesheet" href="css/dashboard.css">
            <link rel="stylesheet" href="css/user.css">
    <?php
        }
        elseif($currentPage === "user.php"){
    ?>
            <link rel="stylesheet" href="css/user.css">
    <?php
        }
        elseif($currentPage === "products.php"){
    ?>
            <link rel="stylesheet" href="css/product_table.css">
    <?php
        }
        elseif($currentPage === "news.php"){
    ?>
        <link rel="stylesheet" href="css/news_table.css">
    <?php
        }
        elseif($currentPage === "settings.php"){
    ?>
            <link rel="stylesheet" href="css/settings.css">
    <?php
        }
    ?>
</head>
<body>
    <div class="dashboard-layout">