<?php
if ($_POST && $_POST["submit"] === "OK")
{
    $login = $_POST["login"];
    $password = $_POST["passwd"];
    // добавить email
    $email = $_POST["email"];
    if ($password === "" || $login === "")
    {
        // header("Location: index.html");
        echo "Введите логин и пароль\n";
        exit();
    }
    $hash_passwd = hash("whirlpool", $password);
    $link = mysqli_connect("localhost", "root", 1234, "ecommerce");
    if (mysqli_connect_errno()) {
        printf("Unable to connect: %s\n", mysqli_connect_error());
        exit();
    }
    $check = "SELECT * FROM users WHERE username = '$login'";
    $result = mysqli_query($link, $check);
    if ($result->num_rows === 0)
    {
        // будем проверять существующий email?
        $email = "abc@abc.ru";
        $query = "INSERT INTO users VALUES ('$login', '$email', '$hash_passwd')";
        if (mysqli_query($link, $query))
            echo "Новый пользователь успешно создан\n";
        else
            echo "Ошибка. Попробуйте еще раз\n";
        // надо на этой же странице вывести сообщение
        // header("Location: index.html"); 
    }
    else
    {
        // на этой же странице надо вывести
        echo "Пользователь уже зарегистрирован\n";
    }
    if ($result->num_rows !== 0)
        mysqli_free_result($result);
    mysqli_close($link);
}
?>