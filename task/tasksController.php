<?php

if($_POST['action'] == 'create') { 
    //Variabelen vullen
    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $user = $_POST['user'];
    $afdeling = $_POST['afdeling']; 
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    //1. Verbinding
    require_once '../backend/conn.php';

    //2. Query

    $query = "INSERT INTO taken (titel, beschrijving, user, afdeling, deadline, status) VALUES(:titel, :beschrijving, :user, :afdeling, :deadline, :status)";

    //3. Prepare
        $statement = $conn->prepare($query);

        
    //4. Execute
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":user" => $user,
        ":afdeling" => $afdeling,
        ":deadline" => $deadline,
        ":status" => $status,
    ]);

    header("location: ". $base_url ."/index.php");
}

// edit code
if($_POST['action'] == 'edit') { 
    //Variabelen vullen
    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $user = $_POST['user'];
    $afdeling = $_POST['afdeling']; 
    $status = $_POST['status'];

    //1. Verbinding
    require_once '../backend/conn.php';
    //2. Query

    $query = "UPDATE taken SET titel = :titel, beschrijving = :beschrijving, user = :user,  afdeling = :afdeling, status = :status WHERE id = :id";

    //3. Prepare
    $statement = $conn->prepare($query);

        
    //4. Execute
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":user" => $user,
        ":afdeling" => $afdeling,
        ":status" => $status,
        ":id" => $_POST['id'],
    ]);
     header("location: ". $base_url ."/index.php");
}

// delete-code

if($_POST['action'] == 'delete') { 
    $id = $_GET['id'];
    require_once '../backend/conn.php';
    $query = "DELETE FROM taken WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":id" => $id,
    ]);
    header("location: ". $base_url ."/index.php");

}

?>




