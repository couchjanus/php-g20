<?php
// ShopController.php
require_once CORE.'/Controller.php';
require_once MODELS.'/Category.php';

class ShopController extends Controller
{
    public function index()
    {
      $title = 'Shopping Page';
      $categories = (new Category())->getCategories();
      $this->view->render('home/shop', compact('title', 'categories'));
    }

}
