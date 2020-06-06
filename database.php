<?php
$link = mysqli_connect("localhost", "root", 1234, "ecommerce");
if (mysqli_connect_errno()) 
{
    printf("Unable to connect: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT * FROM products";
$result = mysqli_query($link, $query);
// get names of all images
$products = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    array_push($products, $row);

$query = "SELECT * FROM categories";
$result = mysqli_query($link, $query);
$squares = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    if ($row['category'] === 'квадратный')
        array_push($squares, $row);
$square_products = array();
foreach ($squares as $square)
    array_push($square_products, $products[$square['pid']]);

mysqli_free_result($result);
mysqli_close($link);
?>