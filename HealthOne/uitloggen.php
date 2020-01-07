<?php
session_start();
session_unset();
session_destroy();
echo "Sessie variables verwijderd en sessie vernietigd.";
header("Location: index.php");
?>