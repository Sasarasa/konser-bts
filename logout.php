<?php
session_start();
$_SESSION["user"];
$_SESSION["id_user"];
unset($_SESSION["user"]);
unset($_SESSION["id_user"]);

header("location:login.php");
ob_end_clean();
