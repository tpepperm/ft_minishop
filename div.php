<?php
foreach ($src as $item)
{
    ?>
    <div class="cart">
    <div class="pic">
        <img id="carpet" src="<?php echo "img/".$item['image'];?>">
    </div>
    <div class="buy">
        <div class="price">
            <span><?php echo $item['price']; ?>Р</span>
        </div>
        <div class="add-to-cart">
            <button type="submit">Добавить в корзину</button>
        </div>
        </div>
        <div>
            <p style="font-size: 12px"><?php echo $item['title'];?></p>
        </div>
    </div>
    <?php
}
?>