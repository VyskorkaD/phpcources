<div class="product">
    <p><?= \Core\Url::getLink('/customer/add', 'Додати клієнта'); ?></p>
</div>

<?php
$customers =  $this->get('customers');

foreach($customers as $customer)  :
?>
    <div class="product">
        <h4><?php echo $customer['first_name'] . ' ' . $customer['last_name']?></h4>
        <p> Телефон: <span class="phone"><?php echo $customer['phone']?></span> </p>
        <p> E-mail: <?php echo $customer['email']?></p>
        <p> Місто: <?php echo $customer['city']?></p>
        <p>
            <?= \Core\Url::getLink('/customer/edit', 'Редагувати', array('id'=>$customer['customer_id'])); ?>
        </p>
    </div>
<?php endforeach; ?>
