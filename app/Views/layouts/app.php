<!DOCTYPE html>
<html lang="en">
<?php require_once VIEWS.'/layouts/partials/_head.php'; ?>
<body>
   <div class="wrapper">
       <?php require_once VIEWS.'/layouts/partials/_sidebar.php'; ?>
       <div id="content">
           <?php require_once VIEWS.'/layouts/partials/_nav.php'; ?>
           <?php include(VIEWS."/".$template); ?>
           <?php require_once VIEWS.'/layouts/partials/_footer.php'; ?>
       </div>
   </div>
   <div class="overlay"></div>
   <script src="/assets/js/main.js"></script>
</body>
</html>
