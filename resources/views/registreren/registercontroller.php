<?php
 
$gebruikersnaam = $_POST['username'];
$naam = $_POST['name'];
$wachtwoord = $_POST['password'];
$hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
 
require_once '../../../config/conn.php';
$query = "SELECT * FROM users WHERE username = :username";
$statement =  $conn->prepare($query);
$statement->execute([
    ":username"=>$gebruikersnaam
]);
$user = $statement->fetch(PDO::FETCH_ASSOC);
 
if ($gebruikersnaam == $name['username']){
    $msg = "Gebruikersnaam naam niet beschikbaar!";
    header("location: register.php?msg=$msg");
    exit;
}
elseif (strlen($wachtwoord) < 8){
    $msg = "Wahtwoord moet minstens 8 karakters bevatten!";
    header("location: register.php?msg=$msg");
    exit;
}
elseif (!preg_match('/[A-Z]/', $wachtwoord)){
    $msg = "Wachtwoord moet minstens één hoofdletter bevatten!";
    header("location: register.php?msg=$msg");
    exit;
}
elseif (!preg_match('/[0-9]/', $wachtwoord)){
    $msg = "Wachtwoord moet minstens één cijfer bevatten!";
    header("location: register.php?msg=$msg");
    exit;
}
else{
    $query = "INSERT INTO users (name, username, password) VALUES(:name, :username, :password)";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":name"=>$naam,
        ":username"=>$gebruikersnaam,
        ":password"=>$hash
    ]);
    $msg = "Account aangemaakt!";
    header("location: $base_url/resources/views/login/login.php?msg=$msg");
    exit;
}
?>
