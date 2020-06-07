<?php
include("database.php");
$src = $products;
if ($_GET["submit"] == "OK")
{
    $src = $square_products;
}
else
$src = $products;
?>
    <?php
    include('header.php');
    ?>
    <section class="content">
        <div class="left">
                <form action="." method="get">
                    <div class="frm-fld">
                        <div class="check">
                            <ul><b>форма</b></label>
                            <li><input type="checkbox" name="form" value="form">круг</li>
                            <li><input type="checkbox" name="form" value="form">квадрат</li>
                            <li><input type="checkbox" name="form" value="form">прямоугольник</li>
                            </ul>
                        </div>
                        <div class="check">
                            <ul><b>цвет</b></label>
                            <li><input type="checkbox" name="form" value="form">красный</li>
                            <li><input type="checkbox" name="form" value="form">зеленый</li>
                            <li><input type="checkbox" name="form" value="form">синий</li>
                            </ul>
                        </div>
                        <div class="check">
                            <ul><b>материал</b></label>
                            <li><input type="checkbox" name="form" value="form">шерсть</li>
                            <li><input type="checkbox" name="form" value="form">шелк</li>
                            <li><input type="checkbox" name="form" value="form">синтетика</li>
                            </ul>
                        </div>
                        <input type="submit" name="submit" value="OK">
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
    <?php
    include('footer.php');
    ?>
</body>
</html>