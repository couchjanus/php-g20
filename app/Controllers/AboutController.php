<?php
// AboutController.php
require_once CORE.'/Controller.php';

class AboutController  extends Controller
{
    public function index()
    {
        $title = 'About <b>Our Cats</b> Members';
        $this->view->render('about/index', ['title'=>$title]);
    }
}