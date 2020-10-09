<?php

return [
   'about' => 'AboutController@index',
   'blog' => 'BlogController@index',
   'contact' => 'ContactController@index',
   'shop' => 'ShopController@index',
   
   'admin' => 'Admin\DashboardController@index',
   'admin/categories' => 'Admin\CategoryController@index',
   'admin/categories/create' => 'Admin\CategoryController@create',
   'admin/categories/stote' => 'Admin\CategoryController@store',
   //Главаня страница
   '' => 'HomeController@index', 
];
