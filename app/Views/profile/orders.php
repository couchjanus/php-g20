<div class="filter-section__wrapper">
    <?php require_once VIEWS.'/profile/_profile.php'; ?>
</div>

<div class="py-5 bg-light">
  <div class="container">
    <h1><?php echo $title; ?></h1>
    <?php if(count($orders)>0):?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Дата оформления</th>
                    <th>Статус заказа</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($orders as $order):?>
                <tr>
                    <td><?= $order->id;?></td>
                    <td><?= $order->formated_date?></td>
                    <td><?php echo Helper::getOrderStatus($order->status);?></td>
                    <td>
                      <a title="Show order" href="/profile/orders/view/<?= $order->id;?>"><button class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i>View</button></a>
                      <a title="Check Order" href="/profile/orders/check/<?= $order->id;?>"><button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>Check me out</button></a>
                    </td>
                </tr>
              <?php endforeach;?>
            </tbody>
        </table>
    <?php endif;?>
  </div>
</div>
