<form class="edit-product" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <h4 class="edit-title">Редагування продукту</h4>
    <ul>
    <?php
        $productData = $this->get('product');
    ?>
        <li>
            <label for="sku">Код:</label>
            <input type="text" id="sku" name="sku" value="<?php echo $productData['sku'] ?>">
        </li>
        <li>
            <label for="name">Назва товару:</label>
            <input type="text" id="name" name="name" value="<?php echo $productData['name'] ?>">
        </li>
        <li>
            <label for="price">Ціна товару:</label>
            <input type="decimal" id="price" name="price" value="<?php echo $productData['price'] ?>">
        </li>
        <li>
            <label for="qty">Кількість товару:</label>
            <input type="decimal" id="qty" name="qty" value="<?php echo $productData['qty'] ?>">
        </li>
        <li>
            <label for="description">Опис:</label>
            <textarea id="description" name="description" rows="4" cols="40" value="<?php echo $productData['description'] ?>"></textarea>
        </li>
    </ul>
    <input class="submit" type="submit" value="Редагувати продукт">
</form>
