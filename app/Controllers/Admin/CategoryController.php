<?php

require_once CORE.'/Controller.php';
require_once CORE.'/Request.php';
require_once MODELS.'/Category.php';

/**
 * CategoryController.php
 */
// =================== Step 1 =====================
class CategoryController extends Controller
{
   public function index()
   {
       $title = 'Categories List';
       $categories = [];
       $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');
   }

    public function create()
    {
        $title = 'Add New Category';
        $this->view->render('admin/categories/create', compact('title'), 'admin');
    }

    public function store()
    {
        $request = new Request();
        var_dump($request);
        var_dump($request->getRequestEntries());
        var_dump($request->name);
        var_dump($request->status);
        $status = $request->status ? 1:0;
        var_dump($status);
        
    }

}
// =================== Step 2 =====================
// class CategoryController extends Controller
// {
//    public function index()
//    {
//        $title = 'Categories List';
//        $categories = (new Category())->all();
//     //    var_dump($categories);
//        $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');
//    }

//     public function create()
//     {
//         $title = 'Add New Category';
//         $this->view->render('admin/categories/create', compact('title'), 'admin');
//     }

//     public function store()
//     {
//         $request = new Request();
//         // var_dump($request);
//         var_dump($request->getRequestEntries());
//         var_dump($request->name);
//         var_dump($request->status);
//         $status = $request->status ? 1:0;
//         var_dump($status);
//     }

// }

// =================== Step 3 =====================

// class CategoryController extends Controller
// {
//    public function index()
//    {
//        $title = 'Categories List';
//        $categories = (new Category())->all();
//        $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');
//    }

//     public function create()
//     {
//         $title = 'Add New Category';
//         $this->view->render('admin/categories/create', compact('title'), 'admin');
//     }

//     public function store()
//     {
//         $request = new Request();
//         $status = $request->status ? 1:0;
//         $rowsCount = (new Category())->save($request->name, $status);
//         if ($rowsCount) {
//             header('Location: /admin/categories');
//         } 
//     }
// }
