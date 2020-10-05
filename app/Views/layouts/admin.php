<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Dashboard</title>
    <?php require_once VIEWS.'/layouts/partials/admin/_styles.php'; ?>
  </head>
  <body>
    <?php require_once VIEWS.'/layouts/partials/admin/_nav.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <?php require_once VIEWS.'/layouts/partials/admin/_sidebar.php'; ?>
           <!-- Page Content  -->
           <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
               <?php require_once VIEWS.'/layouts/partials/admin/_toolbox.php'; ?>
               <?php include(VIEWS."/".$template); ?>
           </main>
        </div>
    </div>

    <?php require_once VIEWS.'/layouts/partials/admin/_scripts.php'; ?>
</body>
</html>
