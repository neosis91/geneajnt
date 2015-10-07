<?php
session_start();

//destruction des variables de session
unset($_SESSION);
session_destroy();
header("Location:index.php");
?>