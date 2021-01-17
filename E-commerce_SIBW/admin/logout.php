<?php
session_start();
unset($_SESSION["logedin"]);
session_unset();
session_destroy();
header("Location: index.php");