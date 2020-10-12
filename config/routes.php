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
   'admin/categories/show/{id}' => 'Admin\CategoryController@show',
   'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
   'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',
   //Главаня страница
   '' => 'HomeController@index', 
];
