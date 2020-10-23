<?php

require_once MODELS.'/User.php';
require_once MODELS.'/Product.php';
require_once CORE.'/Session.php';
require_once CORE.'/Controller.php';
require_once CORE.'/Helper.php';
require_once CORE.'/Request.php';
/**
 * ProfileController.php
 * Контроллер для authetication users
 */
class ProfileController extends Controller
{
    private $user;
    
    public function __construct()
    {
        parent::__construct();
        Session::init();
        $userId = Session::get('userId');
        if ($userId) {
            $this->user = User::getByPrimaryKey($userId);
        } else {
            $this->user = null;
        }
    }
     
    /**
     * страница index
     *
     * @return bool
     */
    public function index()
    {
        if (!$this->user) {
            Helper::redirect('/sign');
        }
        $title = 'Личный кабинет ';
        $user = $this->user;
        $this->view->render('profile/index', compact('title', 'user'));
    }

    /**
     * Просмотр истории заказов пользователя
     *
     * @return bool
    */
    public function ordersList()
    {
        if (!$this->user) {
            Helper::redirect('/sign');
        }
       
    }
    
}