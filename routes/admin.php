<?php

// Get -> category => method index : hien thi danh sach -> name -> category.index
// Get -> category/{id} => method -> show : xem chi tiet -> category.show
// Get -> category/{create} => method -> create  : form them moi -> category.create
// Get -> category/{id}/edit => method -> edit : form chinh sua -> category.edit
// POST -> category/store : thuc hien luu du lieu vao bang do -> category.store
// PUT -> category/update/{id} : luu du lieu khi update -> category.update
// DELETE-> category/destroy/{id} : xoa du lieu -> category.destroy


Route::resources([
    'category' => 'CategoryController',
    'product' => 'ProductController',
    'user' => 'UserController',
    'banner' => 'BannerController'
]);
