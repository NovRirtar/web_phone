<?php
if (isset($_COOKIE['user'])) {
    setcookie('user', "", time() - 1);
    header("location: index.html");
}
?>