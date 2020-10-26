<section class="py-5">
  <div class="container p-0">
    <div class="row">
        <!-- SHOP SIDEBAR-->
        <?php require_once VIEWS.'/profile/_profile.php'; ?>
        <!-- SHOP LISTING-->
        <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
            <div class="row mb-3 align-items-center">
                <h1><?php echo $title; ?></h1>
            </div>
            <div class="row">
                <?php require_once VIEWS.'/layouts/partials/_flash-message.php'; ?>                            
            </div>
        </div>
    </div>
  </div>
</section>
