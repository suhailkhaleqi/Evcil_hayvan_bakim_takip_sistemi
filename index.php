<?php
include "includes/config.php";
if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
} else {
    header("Location: login.php");
}
exit();
?>