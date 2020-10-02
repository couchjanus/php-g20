<?php
// HomeController.php

class HomeController
{
    // Class properties and methods go here   
    public function __construct()
    {
        $title = 'Our <b>Best Cat Members Home Page </b>';
        render('home/index', compact('title'));
    }

    // public function index()
    // {
    //   $title = 'Our <b>Best Cat Members Home Page </b>';
        //   render('home/index', ['title'=>$title]);
        // render('home/index', compact('title'));
    // }
}
