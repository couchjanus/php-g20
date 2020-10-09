<?php
// HomeController.php
require_once CORE.'/Controller.php';
require_once MODELS.'/Category.php';

class HomeController extends Controller
{
    public function index()
    {
      $title = 'Top trending products';
      $categories = (new Category())->getCategories();
      $this->view->render('home/index', compact('title', 'categories'));
    }
   
}
