<?php session_start(); ?>
<!doctype html>
<html lang="nl">

<head>
    <title>Taken / Takenlijst / Aanpassen</title>
    <?php require_once '../components/head.php'; ?>
</head> 

<body>
    <?php

    if (!isset($_GET['id'])) {
        echo "Geef in je aanpaslink op de index.php het id van betreffende item mee achter de URL in je a-element om deze pagina werkend te krijgen na invoer van je vijfstappenplan";
        exit;
    }
    ?>
    <?php
    require_once '../components/header.php'; ?>

    <div class="container">
        <h1>Takenlijst aanpassen</h1>
        test

        <?php
        //Haal het id uit de URL:
        $id = $_GET['id'];

        //1. Haal de verbinding erbij
        require_once '../../../config/conn.php';

        //2. Query, vul deze aan met een WHERE zodat je alleen de melding met dit id ophaalt
        $query = "SELECT * FROM taken WHERE id = :id";

        //3. Van query naar statement
        $statement = $conn->prepare($query);

        //4. Voer de query uit, voeg hier nog de placeholder toe
        $statement->execute([
            ":id" => $id
        ]);
        //5. Ophalen gegevens, tip: gebruik hier fetch().
        $taak = $statement->fetch(PDO::FETCH_ASSOC);
        ?>

        <form action="./../../../app/Http/Controllers/takenController.php" method="POST">
            <!-- (voeg hier opdracht 7 toe) -->
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Titel:</label>
                <?php echo $taak['titel']; ?>
            </div>
            <!-- Zorg dat het type wordt getoond, net als de naam hierboven -->
            <div class="form-group">
                <label for="type">Afdeling: </label>
                <?php echo $taak['afdeling']; ?>
            </div>
            <div class="form-group">
                <label for="categorie">Categorie:</label>
                <select name="categorie" id="categorie">
                    <option value="<?php echo $taak['categorie'] ?>"><?php echo $taak['categorie'] ?></option>
                    <option value="rood">Rood</option>
                    <option value="blauw">Blauw</option>
                    <option value="geel">Geel</option>
                    <option value="groen">Groen</option>
                    <option value="oranje">Oranje</option>
                    <option value="paars">Paars</option>
                </select>  
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="radio" name="status" id="to do" value="0" <?php echo ($taak['status'] == '0') ? 'checked' : ''; ?>>
                <label for="to do">To do</label>
                <input type="radio" name="status" id="doing" value="1" <?php echo ($taak['status'] == '1') ? 'checked' : ''; ?>>
                <label for="doing">Doing</label>
                <input type="radio" name="status" id="done" value="2" <?php echo ($taak['status'] == '2') ? 'checked' : ''; ?> >
                <label for="done">Done</label>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="date" name="deadline" id="deadline" class="form-input" value="<?php echo $taak['deadline']; ?>">
            </div>
            <div class="form-group">
                <label for="beschrijving">Beschrijving</label>
                <textarea name="beschrijving" id="beschrijving" class="form-input" rows="4"><?php echo $taak['beschrijving'] ?></textarea>
            </div>

            <input type="submit" value="Taak opslaan" class="submit">

        </form>

        <form action="../../../app/Http/Controllers/takenController.php" method="post">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <input type="submit" value="Melding verwijderen" onclick="return confirmDelete()">
        </form>
    </div>
    <script>
    function confirmDelete() {
        return confirm("Weet je zeker dat je deze taak wilt veranderen?");
    }
</script>

</body>

</html>