<?php
session_start();
session_destroy();
$msg = "Je bent succesvol uitgelogd!";
header("Location: ../../../index.php?msg=$msg");
exit;
?>