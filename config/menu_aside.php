<?php
// Aside menu
return [

    'items' => [
        // Posts
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin',
            'new-tab' => false,
        ],
        // Posts
        [
            'title' => 'Yazılar',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin/posts',
            'new-tab' => false,
        ],
        // Users
        [
            'title' => 'Kullanıcılar',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin/users',
            'new-tab' => false,
        ],
        // Categories
        [
            'title' => 'Kategoriler',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin/categories',
            'new-tab' => false,
        ],
    ]

];
