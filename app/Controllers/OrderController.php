<?php

require_once MODELS.'/User.php';
require_once CORE.'/Session.php';
require_once CORE.'/Controller.php';

/**
 * OrderController.php
 * 
 */

class OrderController extends Controller
{
    private $user;
    
    public function __construct()
    {
        parent::__construct();
        Session::init();
        // Got users id from Session
        $userId = Session::get('userId');
        if ($userId) {
            $this->user = User::getByPrimaryKey($userId);
        } else {
            $this->user = null;
        }
    }

    protected function json_response($data=null, $httpStatus=200)
    {
        header_remove();
        header("Content-Type: application/json");
        http_response_code($httpStatus);
        echo json_encode($data);
        exit();
    }
    /**
     * Сохранение заказа пользователя в БД
     *
     * @param $userName
     * @param $userId
     * @param $productsInCart
     * @return bool
    */
    public function cart()
    {
        if (!$this->user) {
            Helper::redirect('/sign');
        }
        $this.json_response();
    }
}