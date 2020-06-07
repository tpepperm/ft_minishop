<?php
include('header.php');
include('database.php');
?>
<link rel="stylesheet" href="loginform.css">
<form action="register.php" method="POST">
    <div class="login-form">
        <h3>Зарегистрироваться</h3>
        <div> Логин:
            <input type="text" name="login" value="">
        </div>
        <div> Пароль:
            <input type="password" name="passwd" value="">
        </div>
        <input type="submit" name="submit" value="Подтвердить">
        <p>
        <?php
        if ($_POST && $_POST["submit"] === "Подтвердить")
        {
            $login = $_POST["login"];
            $password = $_POST["passwd"];
            // добавить email
            $email = $_POST["email"];
            if ($password === "" || $login === "")
                echo "Введите логин и пароль\n";
            else 
            {
                $hash_passwd = hash("whirlpool", $password);
                $check = "SELECT * FROM users WHERE username = '$login'";
                $result = mysqli_query($db, $check);
                if ($result->num_rows === 0)
                {
                    // будем проверять существующий email?
                    $email = "abc@abc.ru";
                    $query = "INSERT INTO users(username, email, password) VALUES ('$login', '$email', '$hash_passwd')";
                    if (mysqli_query($db, $query))
                        echo "Новый пользователь успешно создан\n";
                    else
                        echo "Ошибка. Попробуйте еще раз\n";
                    // header("Location: index.html"); 
                }
                else
                    echo "Пользователь уже зарегистрирован\n";
                if ($result->num_rows !== 0)
                    mysqli_free_result($result);
                // mysqli_close($link);
            }
        }   
        ?>
        </p>
    </div>
</form>
</body>
<?php
include('footer.php');
?>