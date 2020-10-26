<?php
// DashboardController.php

require_once CORE.'/Auth.php';
require_once CORE.'/AuthInterface.php';
require_once CORE.'/Helper.php';

class DashboardController extends Auth implements AuthInterface
{
   public function __construct()
   {
        parent::__construct();
   }
   
   public function index()
   {
      if ($this->isAdmin()){
         $title = 'Dashboard';
         $this->view->render('admin/index', compact('title'), 'admin');
      } else {
         Helper::redirect('/profile');
      }  
   }

   public function isAdmin()
   {
        if (!$this->user) {
            return null;
        }
        if ($this->user->role_id == 1) {
            return true;
        } else {
            return false;
        }
   }
}
