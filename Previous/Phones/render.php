<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=0">Від дешевших до дорожчих</a>
    <br>
<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=1">Від дорожчих до дешевших</a>
    <br>
<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=2">Від дешевших до дорожчих зі знижкою</a>
    <br>
<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=3">Від дорожчих до дешевших зі знижкою</a>


<?php
if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else
        {
            $sort = "name";
        }
if (isset($_GET['order'])) {
            $order = $_GET['order'];
        } else {
            $order = 0;
        }

// Сортування

if($_GET['order'] == 0) {
    function comparePricesASC($firstItem, $secondItem) {
        if($firstItem['price'] > $secondItem['price']) {
            return 1;
        }
        else if($firstItem['price'] < $secondItem['price']) {
            return -1;
        }
        else {
            return 0;
        }
    }
    usort($products, "comparePricesASC");
}

elseif($_GET['order'] == 1) {
    function comparePricesDESC($firstItem, $secondItem) {
        if($firstItem['price'] < $secondItem['price']) {
            return 1;
        }
        else if($firstItem['price'] > $secondItem['price']) {
            return -1;
        }
        else {
            return 0;
        }
    }
    usort($products, "comparePricesDESC");
}

elseif($_GET['order'] == 2) {
    function compareWithDiscASC($firstItem, $secondItem) {
        if($firstItem['price'] - ($firstItem['price'] * ($firstItem['discount'] / 100)) > $secondItem['price'] - ($secondItem['price'] * ($secondItem['discount'] / 100))) {
            return 1;
        }
        else if($firstItem['price'] - ($firstItem['price'] * ($firstItem['discount'] / 100)) < $secondItem['price'] - ($secondItem['price'] * ($secondItem['discount'] / 100))) {
            return -1;
        }
        else {
            return 0;
        }
    }
    usort($products, "compareWithDiscASC");
}

else {
    function compareWithDiscDESC($firstItem, $secondItem) {
        if($firstItem['price'] - ($firstItem['price'] * ($firstItem['discount'] / 100)) < $secondItem['price'] - ($secondItem['price'] * ($secondItem['discount'] / 100))) {
            return 1;
        }
        else if($firstItem['price'] - ($firstItem['price'] * ($firstItem['discount'] / 100)) > $secondItem['price'] - ($secondItem['price'] * ($secondItem['discount'] / 100))) {
            return -1;
        }
        else {
            return 0;
        }
    }
    usort($products, "compareWithDiscDESC");
}




foreach($products as $product)  :
?>
    <div class="product">
        <p class="sku">Код: <?php echo $product['sku']?></p>
        <h4><?php echo $product['name']?><h4>
        <p> Ціна: <span class="price"><?php echo $product['price']?></span> грн</p>
        <p> Знижка: <span class="price"><?php echo $product['discount']?></span> %</p>
        <p> Знижка в грн: <span class="price"><?php echo $product['price'] * $product['discount'] / 100?></span> грн</p>
        <p> Ціна зі знижкою: <span class="price"><?php echo $product['price'] - ($product['price'] * $product['discount'] / 100)?></span> грн</p>
        <p><?php if(!$product['qty'] > 0) { echo 'Нема в наявності'; } ?></p>
    </div>
<?php endforeach; ?>
