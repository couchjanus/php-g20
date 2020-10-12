<?php

require_once CORE.'/Controller.php';
require_once CORE.'/Request.php';
require_once MODELS.'/Category.php';

/**
 * CategoryController.php
 */

class CategoryController extends Controller
{
   public function index()
   {
       $title = 'Categories List';
       $categories = (new Category())->all();
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
        $status = $request->status ? 1:0;
        (new Category())->save($request->name, $status);
        $lastId = header('Location: /admin/categories');
    }

    public function show($vars)
    {
        extract($vars);
        // var_dump($id);
        $id = 1;
        $category = (new Category())->getByPrimaryKey($id);
        var_dump($category);
        // $title = 'Category Page ';
        // $this->view->render('admin/categories/show', compact('title', 'category'), 'admin');
    }

    public function edit($vars)
    {
        extract($vars);
        $category = (new Category())->getByPrimaryKey($id);
        $title = 'Edit Category Page ';
        $this->view->render('admin/categories/edit', compact('title', 'category'), 'admin');
    }

    public function patch()
    {
        $request = new Request();
        $status = $request->status ? 1:0;
        (new Category())->update($request->id, $request->name, $status);
        header('Location: /admin/categories');
    }

    public function delete($vars)
    {
        extract($vars);
        if (isset($_POST['submit'])) {
            (new Category())->destroy($id);
            header('Location: /admin/categories');
        } elseif (isset($_POST['reset'])) {
            header('Location: /admin/categories');
        }
        $title = 'Delete Category ';
        $category = (new Category())->getByPrimaryKey($id);
        $this->view->render('admin/categories/delete', compact('title', 'category'), 'admin');
    }
}
