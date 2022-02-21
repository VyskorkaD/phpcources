<form class="add-product" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <h4 class="add-title">Додавання продукту</h4>
    <ul>
        <li>
            <label for="sku">Код:</label>
            <input type="text" id="sku" name="sku">
        </li>
        <li>
            <label for="name">Назва товару:</label>
            <input type="text" id="name" name="name">
        </li>
        <li>
            <label for="price">Ціна товару:</label>
            <input type="decimal" id="price" name="price">
        </li>
        <li>
            <label for="qty">Кількість товару:</label>
            <input type="decimal" id="qty" name="qty">
        </li>
        <li>
            <label for="description">Опис:</label>
            <textarea id="description" name="description" rows="4" cols="40"></textarea>
        </li>
    </ul>
    <input class="submit" type="submit" value="Додати продукт">
</form>
