<?php
require_once '../../../config/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'create') {
        $titel = $_POST['titel'];
        $afdeling = $_POST['afdeling'];
        $categorie = $_POST['categorie'];
        $status = $_POST['status'];
        $deadline = $_POST['deadline'];
        $beschrijving = $_POST['beschrijving'];
        $user = $_SESSION['username'];

        $sql = "INSERT INTO taken (titel, afdeling, categorie, status, deadline, beschrijving, user) 
                VALUES (:titel, :afdeling, :categorie, :status, :deadline, :beschrijving, :user)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':titel' => $titel,
            ':afdeling' => $afdeling,
            ':categorie' => $categorie,
            ':status' => $status,
            ':deadline' => !empty($deadline) ? $deadline : '2023-12-31',
            ':beschrijving' => $beschrijving,
            ':user' => $user
        ]);

        header("Location: ../../../resources/views/taken/index.php");
        exit;

    } elseif ($action === 'updateStatus') {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $query = "UPDATE taken SET status = :status WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id,
            ":status" => $status
        ]);

        header("Location: ../../../resources/views/taken/index.php?msg=Status bijgewerkt!");
        exit;

    } elseif ($action === 'delete') {
        $id = $_POST['id'];

        $query = "DELETE FROM taken WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);

        header("Location: ../../../resources/views/taken/index.php?msg=Taak succesvol verwijderd!");
        exit;

    } elseif ($action === 'update') {
        $id = $_POST['id'];
        $categorie = $_POST['categorie'];
        $status = $_POST['status'];
        $deadline = $_POST['deadline'];
        $beschrijving = $_POST['beschrijving'];

        $query = "UPDATE taken SET categorie = :categorie, status = :status, deadline = :deadline, beschrijving = :beschrijving WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
            ':id' => $id,
            ':categorie' => $categorie,
            ':status' => $status,
            ':deadline' => !empty($deadline) ? $deadline : '2023-12-31',
            ':beschrijving' => $beschrijving
        ]);

        header("Location: ../../../resources/views/taken/index.php?msg=Taak bijgewerkt!");
        exit;

    }
}
?>
