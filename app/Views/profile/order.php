<div class="filter-section__wrapper">
    <?php require_once VIEWS.'/profile/_profile.php'; ?>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <h1><?php echo $title; ?></h1>
        <dt>Дата заказа: <?=$order->order_date?>
        <dt>Статус: <?=Helper::getOrderStatus($order->status);?>
    <h2>Товары в заказе</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Товар</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Image</th>
                </tr>
            </thead>
            <?php $totalValue = 0;?>
            <tbody>
              <?php foreach ((array)$products as $product):?>
                <tr>
                    <td><?=$product['id'];?></td>
                    <td><?=$product['name']?></td>
                    <td><?=$product['amount'];?></td>
                    <td><?=$product['price'];?></td>
                    <td><img src="/assets/images/products/<?=$product['picture'];?>"></td>
                </tr>
                <?php 
                //подсчитываем сумму по каждому товару и пишем в массив
                $arr[] = $product['price'] * $product['amount'];
                //считаем общую сумму всех товаров в заказе, с учетом их кол-ва
                $totalValue = array_sum($arr);
                ?>
            </tbody>
            <?php endforeach;?>
            <tfoot>
            <tr class="total_price">
                <td colspan="5"><?php echo '<strong>Сумма заказа: ' . $totalValue.' грн</strong>';?></td>
                </tr>
            </tfoot>
            <?php               
                //Очищаем массив
                $arr = array();
            ?>
    </table>
  </div>
</div>
