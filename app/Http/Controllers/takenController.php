<?php
// var_dump($_POST);
// die;
//Variabelen vullen
$action = $_POST['action'];
if ($action == 'create') 
{
    $titel = $_POST['titel'];
    if (empty($titel)) {
        $error[] = "Vul een titel in!";
    }
    $afdeling = $_POST['afdeling'];
    if (empty($afdeling)) {
        $error[] = "Kies een afdeling!";
    }
    if ($_POST['status'] == '0') {
        $status = '0';
    } elseif ($_POST['status'] == '1') {
        $status = '1';
    } else {
        $status = '2';
    }
    $categorie = $_POST['categorie'];
    if (empty($categorie)) {
        $error[] = "Vul een categorie in!";
    }
    $beschrijving = $_POST['beschrijving'];
    if (empty($beschrijving)) {
        $error[] = "Vul een beschrijving in!";
    }
    $created_by = $_POST['created_by'];
    if (empty($created_by)) {
        $error[] = "Vul een naam in!";
    }
    $deadline = $_POST['deadline'];
    if (empty($deadline)) {
        $error[] = "Vul een deadline in!";
    }

    //1. Verbinding
    require_once '../../../config/conn.php';

    //2. Query
    $query = "INSERT INTO taken (titel, afdeling, status, deadline, categorie, beschrijving, created_by) VALUES(:titel, :afdeling, :status, :deadline, :categorie, :beschrijving, :created_by)";

    //3. Prepare
    $statement = $conn->prepare($query);
    $statement->execute([
        ":titel" => $titel,
        ":afdeling" => $afdeling,
        ":status" => $status,
        ":deadline" => $deadline,
        ":categorie" => $categorie,
        ":beschrijving" => $beschrijving,
        ":created_by" => $created_by
    ]);

    //4. Execute
    $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

    header("Location: ../../../resources/views/taken/index.php?msg=Aangepast!");
}
    

if ($action == 'update') 
{
    $id = $_POST['id'];
    $categorie = $_POST['categorie'];
    if ($_POST['status'] == '0') {
        $status = '0';
    } elseif ($_POST['status'] == '1') {
        $status = '1';
    } else {
        $status = '2';
    }
    $beschrijving = $_POST['beschrijving']; 
    $deadline = $_POST['deadline'];

    require_once '../../../config/conn.php';
    $query = "UPDATE taken SET status = :status, categorie = :categorie, beschrijving = :beschrijving, deadline = :deadline WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":id" => $id,
        ":status" => $status,
        ":categorie" => $categorie,
        ":beschrijving" => $beschrijving,
        ":deadline" => $deadline,
    ]);

    header("Location: ../../../resources/views/taken/index.php?msg=Taak aangepast!");
    

    // $melding = $statement->fetch(PDO::FETCH_ASSOC);

} 
elseif ($action == 'updateStatus') 
{

    $id = $_POST['id'];

    if ($_POST['status'] == '0') {
        $status = '0';
    } elseif ($_POST['status'] == '1') {
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

    header("Location: ../../resources/views/taken/index.php?msg=Status bijgewerkt!");
   
}


if ($action == "delete") {
    $id = $_POST['id'];
    require_once '../../../config/conn.php';
    $query = "DELETE FROM taken WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":id" => $id
    ]);

    header("Location: ../../../resources/views/taken/index.php?msg=Taak verwijderd");
}