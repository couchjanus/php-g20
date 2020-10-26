<section class="py-5">
    <div class="container p-0">
        <div class="row">
            <?php require_once VIEWS.'/profile/_profile.php'; ?>
            <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row mb-3 align-items-center">
                    <h1><?php echo $title; ?></h1>
                    <dt>Дата заказа: <?=$order->order_date?>
                    <dt>Статус: <?=Helper::getOrderStatus($order->status);?>
                        <h2>Товары в заказе</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Товар</th>
                                    <th>Количесево</th>
                                    <th>Цена</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <?php $totalValue = 0;?>
                            <tbody>
                                <?php foreach((array)$products as $product):?>
                                <tr>
                                    <td><?=$product['id'];?></td>
                                    <td><?=$product['name']?></td>
                                    <td><?=$product['amount'];?></td>
                                    <td><?=$product['price'];?></td>
                                    <td><img src="/assets/images/products/<?=$product['picture'];?>" class="img-fluid w-20"></td>
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
                                    <td colspan="5"><?='<strong>Сумма заказа: ' . $totalValue.' грн</strong>';?>
                                    </td>
                                </tr>
                            </tfoot>
                            <?php $arr = array(); //Очищаем массив?>
                        </table>
                </div>
                <div class="row">
                    <?php require_once VIEWS.'/layouts/partials/_flash-message.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>