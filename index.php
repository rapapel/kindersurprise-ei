<?php 
session_start();
?>
<!doctype html>
<html lang="nl">

<head>
    <title>Taken</title>
    <?php require_once 'resources/views/components/head.php'; ?>
</head>

<body>

    <?php require_once 'resources/views/components/header.php'; ?>

    <div class="container home">
        <?php
        if(isset($_GET['msg'])){
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        }
        ?>
        <h1>Welkom bij de technische dienst</h1>
        <img src="public_html/img/logo-big-fill-only.png" alt="logo">

    </div>

</body>

</html>
