<?php

return [
    [
        'name' => 'DashBoard',
        'icon' => 'fa-home',
        'route' => 'admin.index'
    ],[
        'name' => 'QL. Danh muc',
        'icon' => 'fa-file-word-o',
        'route' => 'category.index',
        'items' => [
            [
                'name' => 'Danh sach',
                'icon' => 'fa-circle-o',
                'route' => 'category.index'
            ],[
                'name' => 'Them moi',
                'icon' => 'fa-circle-o',
                'route' => 'category.create'
            ]
        ]
    ],[
        'name' => 'QL. San Pham',
        'icon' => 'fa-grav ',
        'route' => 'product.index',
        'items' => [
            [
                'name' => 'Danh sach',
                'icon' => 'fa-circle-o',
                'route' => 'product.index'
            ],[
                'name' => 'Them moi',
                'icon' => 'fa-circle-o',
                'route' => 'product.create'
            ]
        ]
    ],[
        'name' => 'QL. Banner',
        'icon' => 'fa-image',
        'route' => 'banner.index',
        'items' => [
            [
                'name' => 'Danh sach',
                'icon' => 'fa-circle-o',
                'route' => 'banner.index'
            ],[
                'name' => 'Them moi',
                'icon' => 'fa-circle-o',
                'route' => 'banner.create'
            ]
        ]
        ],[
            'name' => 'QL. Admin',
            'icon' => 'fa-user',
            'route' => 'account.index',
            'items' => [
                [
                    'name' => 'Danh sach',
                    'icon' => 'fa-circle-o',
                    'route' => 'account.index'
                ],[
                    'name' => 'Them moi',
                    'icon' => 'fa-circle-o',
                    'route' => 'account.create'
                ]
            ]
        ]
];

?>