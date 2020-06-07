<?php
function auth($login, $passwd)
{
    include('database.php');
    if (!$login || !$passwd)
        return false;
    $query = "SELECT * FROM users WHERE username = '$login'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    $hash_passwd = hash('whirlpool', $passwd);
    if ($row['password'] == $hash_passwd)
        return true;
    else
        return false;
}
?>