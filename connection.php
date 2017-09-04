<?php
session_start();
$link = mysqli_connect("localhost", "root", "password", "shopping_cart");

if (mysqli_connect_error()) {
    die ("Database Connection Error");
}

?>