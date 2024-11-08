<?php
if (isset($_POST['action']) && $_POST['action'] == 'updateStatus') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    if ($status == '0') {
        $status = '0';
    } elseif ($status == '1') {
        $status = '1';
    } else {
        $status = '2';
    }

    require_once '../../../config/conn.php';

    $query = "UPDATE taken SET status = :status WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":id" => $id,
        ":status" => $status
    ]);

    header("Location: ../../../resources/views/taken/index.php?msg=Status bijgewerkt!");
}
