<?php
session_start();
require_once '../../../config/conn.php';
if (!isset($_SESSION['user_id'])) {
    $msg = "Je moet eerst inloggen!";
    header("Location: $base_url/index.php");
    exit;
}
?>
<!doctype html>
<html lang="nl">

<head>
    <title>Taken / Takenlijst / Nieuw</title>
    <?php require_once __DIR__ . '/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__ . '/../components/header.php'; ?>

    <div class="container">
        <h1>Nieuwe taak</h1>

        <form action="<?php echo $base_url; ?>/app/Http/Controllers/takenController.php" method="POST">
            <input type="hidden" name="action" value="create">
            <div class="form-group">
                <label for="titel">Titel:</label>
                <input type="text" name="titel" id="titel" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="afdeling">Afdeling</label>
                <select name="afdeling" id="afdleling" required>
                    <option value="">- Kies een afdeling -</option>
                    <option value="personeel">Personeel</option>
                    <option value="horeca">Horeca</option>
                    <option value="techniek">Techniek</option>
                    <option value="inkoop">Inkoop</option>
                    <option value="klantenservice">Klantenservice</option>
                    <option value="groen">Groen</option>
                </select>
            </div>
            <div class="form-group">
                <label for="categorie">Categorie</label>
                <select name="categorie" id="categorie" required>
                    <option value="">-Kies een categorie</option>
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
                <input type="radio" name="status" id="to-do" value="0" required>
                <label for="to-do">To do</label>
                <input type="radio" name="status" id="doing" value="1" required>
                <label for="doing">Doing</label>
                <input type="radio" name="status" id="done" value="2" required>
                <label for="done">Done</label>
            </div>
            <div class="form-group">
                <label for="deadline"> Deadline:</label>
                <input type="date" name="deadline" id="deadline" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="user">Created_by:</label>
                <input type="text" name="user" id="user" class="form-input" value="<?php echo ($_SESSION['username']) ?>" readonly>
            </div>

            <div class="form-group">
                <label for="beschrijving">Beschrijving</label>
                <textarea name="beschrijving" id="beschrijving" rows="4" class="form-input" required></textarea>
            </div>

            <input type="submit" value="Verstuur melding">

        </form>
    </div>

</body>

</html>