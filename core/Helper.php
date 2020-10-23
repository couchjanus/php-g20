<?php

class Helper
{
    public static function redirect($redirect_url = '/')
    {
        header('HTTP/1.1 200 OK');
        header('Location: http://'.$_SERVER['HTTP_HOST'].$redirect_url);
        exit();
    }
    public static function isGuest()
    {
        if (isset($_COOKIE['Logged'])) {
            return false;
        }
        return true;
    }

    public static function isMessage()
    {
        if (Session::get('error')) {
            return ['error', Session::get('error')];
        } 
        if (Session::get('success')) {
            return ['success', Session::get('success')];
        }
        return false;
    }

    public static function getOrderStatus($status)
    {
        switch ($status) {
            case '1' :
                return 'Новый';
                break;
            case '2' :
                return 'В обработке';
                break;
            case '3' :
                return 'Доставляется';
                break;
            case '4' :
                return 'Закрыт';
                break;
        }                
    }
}
