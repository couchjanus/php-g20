<?php
// HomeController.php

class HomeController
{
    public function index()
    {
      $title = 'Our <b>Best Cat Members Home Page </b>';
      // render('home/index', ['title'=>$title]);
      $this->render('home/index', compact('title'));
    }

    public function render($template, $data = null, $layout='app') 
    {
        if ( !empty($data) ) {  
          extract($data); 
        }
        $template .= '.php';
        return require VIEWS."/layouts/${layout}.php";
    }
}
