<?php
if (isset($_COOKIE['email'])) {
    unset($_COOKIE['email']);
    setcookie('email', null, -1, '/');
    header("location:login.php");
} else {
    return false;
}
