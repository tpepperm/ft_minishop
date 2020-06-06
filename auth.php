<?php
function auth($login, $passwd)
{
    if (!$login || !$passwd)
        return false;
    $link = mysqli_connect("localhost", "root", 1234, "ecommerce");
    if (mysqli_connect_errno()) {
        printf("Unable to connect: %s\n", mysqli_connect_error());
        exit();
    }
    $query = "SELECT * FROM users WHERE username = '$login'";
    $result = mysqli_query($link, $query);
    // DOESNOT RETRIEVE ALL ???
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($link);
    $hash_passwd = hash('whirlpool', $passwd);
    if ($row['password'] == $hash_passwd)
        return true;
    else
        return false;
}
?>