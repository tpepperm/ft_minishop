<?php
session_start();
include('auth.php');
include('header.php');
include('database.php');
?>
<link rel="stylesheet" href="loginform.css">
<form action="login.php" method="POST">
    <div class="login-form">
        <h3>Войти</h3>
        <div> Логин:
            <input type="text" name="login" value="">
        </div>
        <div> Пароль:
            <input type="password" name="passwd" value="">
        </div>
        <input type="submit" name="submit" value="Подтвердить">
        <p><?php
        if ($_POST && $_POST["submit"] === "Подтвердить")
        {
            if (!$_POST["login"] || !$_POST["passwd"])
                echo "Введите логин и пароль\n";
            else
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
        }
        ?></p>
    </div>
</form>
</body>
<?php
include('footer.php');
?>