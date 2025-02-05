<?php
session_start();
unset($_SESSION["user"]);
if(isset($_GET["redirect"])) {
    if($_GET["redirect"] == "admin") {
        header("location:/cafena/admin");
    }
} else {
    header("location:/cafena/views");
}
?>