<?php
require_once '../../../config/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'create') {
        $titel = $_POST['titel'];
        $afdeling = $_POST['afdeling'];
        $categorie = $_POST['categorie'];
        $status = $_POST['status'];
        $deadline = $_POST['deadline'];
        $beschrijving = $_POST['beschrijving'];
        $user = $_SESSION['username'];

        // Voeg taak toe aan de database
        $sql = "INSERT INTO taken (titel, afdeling, categorie, status, deadline, beschrijving, user) 
                VALUES (:titel, :afdeling, :categorie, :status, :deadline, :beschrijving, :user)";
        $stmt = $conn->prepare($sql);

        // Execute de query met parameters
        $stmt->execute([
            ':titel' => $titel,
            ':afdeling' => $afdeling,
            ':categorie' => $categorie,
            ':status' => $status,
            ':deadline' => $deadline,
            ':beschrijving' => $beschrijving,
            ':user' => $user
        ]);

        if ($stmt) {
            header("Location: ../../../resources/views/taken/index.php");
            exit;
        } else {
            echo "Er is een fout opgetreden bij het toevoegen van de taak.";
        }
    } elseif ($action === 'updateStatus') {
        $id = $_POST['id'];
        $status = $_POST['status'];

        // Update de status van de taak
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

        // Verwijder de taak uit de database
        $query = "DELETE FROM taken WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);

        header("Location: ../../../resources/views/taken/index.php?msg=Taak succesvol verwijderd!");
        exit;
    }
}
?>
