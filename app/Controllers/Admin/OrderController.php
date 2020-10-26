<?php

require_once CORE.'/Controller.php';
require_once CORE.'/Request.php';
require_once MODELS.'/Order.php';

/**
 * OrderController.php
 */

class OrderController extends Controller
{
   public function index()
   {
       $title = 'Orders List';
       $orders = (new Order())::getAll();
       $this->view->render('admin/orders/index', compact('title', 'orders'), 'admin');
   }

    public function show($vars)
    {
        extract($vars);
        $order = (new Order())::getByPrimaryKey($id);
        $title = 'Order Page ';
        $this->view->render('admin/orders/show', compact('title', 'order'), 'admin');
    }

    public function edit($vars)
    {
        extract($vars);
        $order = (new Order())::getByPrimaryKey($id);
        $title = 'Edit Order Page ';
        $this->view->render('admin/orders/edit', compact('title', 'order'), 'admin');
    }

    public function patch()
    {
        $request = new Request();
        $status = $request->status ? 1:0;
        (new Order())::update($request->id, ["name"=>$request->name, "status"=>$status]);
        header('Location: /admin/orders');
    }

    public function delete($vars)
    {
        extract($vars);
        $title = 'Delete Order ';
        $order = (new Order())::getByPrimaryKey($id);
        $this->view->render('admin/orders/delete', compact('title', 'order'), 'admin');
    }
    public function destroy()
    {
        $request = new Request();
        if (isset($_POST['submit'])) {
            (new Order())::destroy($request->id);
            header('Location: /admin/orders');
        } else {
            header('Location: /admin/orders');
        }
    }  
}
