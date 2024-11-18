<?php
    session_start();
    $_SESSION["color"] = ($_POST["color"]);
    header("Location:grid.php");
?>