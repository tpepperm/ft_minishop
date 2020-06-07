<?php
include("database.php");
$src = $products;
// if ($_GET["submit"] == "Submit")
// {
    // $src = $square_products;
// }
// else
$src = $products;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ft_minishop</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <!-- <div class="logo"> -->
        <img class="logo" src="img/logo.png"><h1>Ковры. Дорого</h1>
        <!-- </div> -->
        <div class="account">
            <a href="login.php">Личный кабинет</a>
        </div>
    </header>
    <section class="content">
        <div class="left">
                <form action="." method="get">
                    <div class="frm-fld">
                        <div class="frm">
                            <input type="checkbox" name="form" value="form">
                            <label for="form">форма</label>
                        </div>
                        <div class="clr">
                            <input type="checkbox" name="form" value="color">
                            <label for="color">цвет</label>
                        </div>
                        <div>
                            <input type="checkbox" name="form" value="material">
                            <label for="material">материал</label>
                        </div>
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
        </div>
        <div class="main">
            <div class="string">
                <?php
                include("div.php");
                ?>
            </div>
        </div>
    </section>
    <footer>
        <div class="copirigth">
            <ul>
                <li>Связаться с нами</li>
                <li>+7 495 000 00 00</li>
            </ul>

        </div>
    </footer>
</body>
</html>