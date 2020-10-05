<?php
// CategoryController.php
// require_once CORE.'/Controller.php';

// class CategoryController extends Controller
class CategoryController
{
   public function index()
   {
       $title = 'Categories List';
       render('admin/categories/index', compact('title'), 'admin');
    //    $this->view->render('admin/categories/index', compact('title'), 'admin');
   }

}    
