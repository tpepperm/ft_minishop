<?php
if ($_POST && $_POST["submit"] === "OK")
{
    $login = $_POST["login"];
    $password = $_POST["passwd"];
    if ($password === "" || $login === "")
    {
        // header("Location: index.html");
        echo "Введите логин и пароль\n";
        exit();
    }
    $hash_passwd = hash("whirlpool", $password); !!!
    $link = mysqli_connect("localhost", "root", 1234, "ecommerce");
    if (mysqli_connect_errno()) {
        printf("Unable to connect: %s\n", mysqli_connect_error());
        exit();
    }
    $check = "SELECT * FROM users WHERE username = '$login'";
    $result = mysqli_query($link, $check);
    if ($result->num_rows === 1)
    {
        // проверяем пароль
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($row['password'] == $hash_passwd)
        {
            $query = "DELETE FROM users WHERE username = '$login'";
            if (mysqli_query($link, $query))
                echo "Пользователь успешно удален\n";
            else
                echo "Ошибка. Попробуйте еще раз\n";
            // надо на этой же странице вывести сообщение
            // header("Location: index.html"); 
        }
        else 
            echo "Неправильный пароль\n";
    }
    else
    {
        // на этой же странице надо вывести
        echo "Пользователь не найден\n";
    }
    if ($result->num_rows !== 0)
        mysqli_free_result($result);
    mysqli_close($link);
}
?>