<?php

require_once MODELS.'/User.php';
require_once MODELS.'/Order.php';
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

        // Only allow POST requests
        if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
            throw new Exception('Only POST requests are allowed');
        }

        // Make sure Content-Type is application/json 
        $content_type = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
        if (stripos($content_type, 'application/json') === false) {
            throw new Exception('Content-Type must be application/json');
        } else {
            // Read the input stream
            // Receive the RAW post data.
            $content = trim(file_get_contents("php://input"));

            // Decode the JSON object
            $decoded = json_decode($content, true);

            // Throw an exception if decoding failed
            if (!is_array($decoded)) {
                throw new Exception('Failed to decode JSON object');
            }
            $productsInCart = json_encode($decoded['cart']);
            (new Order())::insert(["user_id"=>$this->user->id, "products"=>$productsInCart]);
            echo json_encode($options);
        }
    }
}