<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taken / Takenlijst / Nieuw</title>
    <?php require_once __DIR__ . '/../components/head.php'; ?>
    <title>Document</title>
</head>
 
<body>
    <?php require_once __DIR__ . '/../components/header.php'; ?>
    <main>
        <div class="container">
            <?php
            if (isset($_GET['msg'])) {
                echo "<div class='msg'>" . $_GET['msg'] . "</div>";
            }
            ?>
            <form action="../../../app/Http/Controllers/registerController.php" method="post">
                <div class="form-group">    
                    <label for="name">Naam:</label>
                    <input type="text" name="name" id="name" placeholder="naam" required>
                </div>
                <div class="form-group">
                    <label for="username">Gebruikersnaam:</label>
                    <input type="text" name="username" id="username" placeholder="username">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                    <input type="password" name="password" id="password" placeholder="pass" required>
                </div>
 
                <input type="submit" value="Account aanmaken">
            </form>
        </div>
    </main>
</body>
 
</html>