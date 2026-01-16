<?php
session_start();

if (isset($_POST["senden"])) {

    if (!isset($_SESSION['user'])) {
        $_SESSION['user'] = filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING);
    }

    if (!isset($_SESSION['password'])) {
        $_SESSION['password'] = filter_input(INPUT_POST, "password", FILTER_FLAG_STRIP_HIGH);
    }

    print $_SESSION['user']."<br>".$_SESSION['password'];
}
