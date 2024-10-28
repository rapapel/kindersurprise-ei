<?php require_once __DIR__.'/app/Http/Controllers/meldingenController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De Krant</title>
</head>

<body>
    <?php
    $title = "Brandweer redt de kat uit de boom";
    $date =  "1 feb 2021";
    $contents = "Lorem ipsum dolor sit amet consectetur adipisicing elit. At, tempora in! Quisquam amet illum alias tenetur sequi, culpa accusamus quos at rerum deserunt nisi explicabo est fugit quidem fugiat sunt?";
    $author = "Robin Kersten";
    ?>
    
    <h1><?php echo $title ?></h1>
    <p><em>Datum: <?php echo $date?></em></p>
    <p><em>Author: <?php echo $author?></em></p>
    <p><?php echo $contents?></p>
    <p><?php print_r($meldingen)?></p>
</body>

</html>