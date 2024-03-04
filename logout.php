<?php
session_start();

// Ukončení session
session_destroy();

// Přesměrování na přihlašovací stránku nebo jinou stránku podle potřeby
header("Location: index.php");
exit();
?>