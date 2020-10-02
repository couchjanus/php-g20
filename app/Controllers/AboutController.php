<?php
// AboutController.php

class AboutController
{
    // Class properties and methods go here   
    // public function __construct()
    // {
    //     render('about/index', ['title'=>'About <b>Our Cats</b> Members']);
    // }

    public function index()
    {
        $title = 'About <b>Our Cats</b> Members';
        render('about/index', ['title'=>$title]);
    }
}