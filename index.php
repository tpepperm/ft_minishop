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
    <?php
    include('header.php');
    ?>
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
    <?php
    include('footer.php');
    ?>
</body>
</html>