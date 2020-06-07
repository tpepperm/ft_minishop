<?php
$servername = "localhost";
$username = "root";
$password = "1234";

// подключаемся к mysql
$link = mysqli_connect($servername, $username, $password);
if (mysqli_connect_errno()) 
{
    print_r("Unable to connect: %s\n", mysqli_connect_error());
    exit();
}
// создаем базу данных 'ft_minishop', куда будем копировать
$query = "CREATE DATABASE IF NOT EXISTS ft_minishop";
if (!mysqli_query($link, $query))
{
    print_r("Unable to create 'ft_minishop' database\n");
    exit();
}
// копируем в 'ft_minishop' данные из 'ecommerce.sql'
shell_exec('mysql -u '.$username.' -p'.$password.' ft_minishop < ecommerce.sql');

// подключаемся к бд 'ft_minishop'
$sql = mysqli_connect($servername, $username, $password, 'ft_minishop');

// берем все товары из бд
$query = "SELECT * FROM products";
$result = mysqli_query($sql, $query);
$products = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    array_push($products, $row);

// берем все категории из бд
$query = "SELECT * FROM categories";
$result = mysqli_query($sql, $query);
// сохраняем информацию о всех квадратных коврах
$squares = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    if ($row['category'] === 'квадратный')
        array_push($squares, $row);
// подтягиваем из таблицы товаров все квадратные ковры
$square_products = array();
foreach ($squares as $square)
    array_push($square_products, $products[$square['pid']]);

mysqli_free_result($result);
mysqli_close($sql);
?>