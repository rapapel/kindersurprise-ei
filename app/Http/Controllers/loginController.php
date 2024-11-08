<?php
session_start();

$gebruikersnaam = $_POST['username'];
$password = $_POST['password'];

require_once '../../../config/conn.php';

$query = "SELECT * FROM users WHERE username = :username";
$statement = $conn->prepare($query);
$statement->execute([
    ":username" => $gebruikersnaam,
]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($statement->rowCount() < 1) {
    die("Error: account bestaat niet!");
}

if (!password_verify($password, $user['password'])) {
    die("Error: wachtwoord onjuist!");
}

$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];

$msg = "Je bent ingelogd!";
header("Location: $base_url resources/views/taken/index.php?msg=$msg");
exit;
?>
