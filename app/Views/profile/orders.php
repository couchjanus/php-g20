<section class="py-5">
  <div class="container p-0">
    <div class="row">
      <?php require_once VIEWS.'/profile/_profile.php'; ?>
      <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
        <h2><?=$title; ?></h2>
        <?php if(count($orders)>0):?>
          <div class="row mb-3 align-items-center">
            <h2>All Orders</h2>
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
          </div>
        <?php else:?>
          <div class="row mt-3">
            <h3>No Orders yet</h3>
          </div>
        <?php endif;?>
        
        <div class="row">
          <?php require_once VIEWS.'/layouts/partials/_flash-message.php'; ?>                            
        </div>
      </div>
    </div>
  </div>
</section>
