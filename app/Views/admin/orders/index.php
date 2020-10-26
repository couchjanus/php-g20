<div class="col">
    <div class="card">
        
        <div class="table-responsive">
            <?php if (!empty($orders) && count($orders)>0):?>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>User Name</th>
                  <th>Order Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach ($orders as $order):?>
                    <tr>
                    <td><?=$order->order_id;?></td>
                    <td><?=$order->name;?></td>
                    <td><?=$order->order_date;?></td>
                    
                    <td>
                      <a href="/admin/orders/show/<?=$order->order_id?>"><button class="btn btn-default"><span data-feather="eye"></span> View</button></a>
                      <a href="/admin/orders/edit/<?=$order->order_id?>"><button class="btn btn-primary"><span data-feather="edit"></span> Edit</button></a>
                      <a href="/admin/orders/delete/<?=$order->order_id?>"><button class="btn btn-danger"><span data-feather="delete"></span> Delete</button></a>
                    </td>
                    </tr>
                <?php endforeach;?>
              </tbody>
            </table>  
            <?php else: echo "No orders yet...";?>
            <?php  endif;?>
        </div>
    </div>
</div>