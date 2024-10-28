<?php
session_start();
session_destroy();
$msg = "Je bent succesvol uitgelogd!";
header("Location: $base_url/index.php?msg=$msg");
exit;
?>