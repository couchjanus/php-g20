<?php
require_once CORE.'/Controller.php';

class ErrorController extends Controller
{
    public function NotFound()
    {
        $title = '404 Page Not Found';
        $message = 'Oops, we are sorry but the page you are looking for was not found!';
        $this->view->render('errors/index', compact('title', 'message'));
    }

    public function Unauthenticated(){
        $title = '401 Unauthenticated';
        $message = "Sorry, you aren't authenticated. Please login with valid credentials";
        $this->view->render('errors/index', compact('title', 'message'));
    }

    public function Unauthorized(){
        $title = '403 Unauthorized';
        $message = "Sorry, you aren't authenticated to perform this action!";
        $this->view->render('errors/index', compact('title', 'message'));
    }

    public function BadRequest(){
        $title = '400 Bad Request';
        $message = 'Something gone wrong!';
        $this->view->render('errors/index', compact('title', 'message'));
    }

    public function System(){
        $title = '500 System Error';
        $message = 'Oops, we are sorry but our system encountered an internal error<br>But do not worry, we are on it';
        $this->view->render('errors/index', compact('title', 'message'));
    }
}