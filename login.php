<?php
include("auth.php");
session_start();
if ($_POST && $_POST["login"] && $_POST["passwd"])
{
    $login = $_POST["login"];
    $password = $_POST["passwd"];
    if (auth($login, $password) === true)
    {
        $_SESSION["loggued_on_user"] = $login;
        echo "Добро пожаловать\n";
    }
    else
    {
        $_SESSION["loggued_on_user"] = "";
        echo "Неверный логин или пароль\n";
    }
}
// else
    // echo "Введите логин и пароль\n";
?>