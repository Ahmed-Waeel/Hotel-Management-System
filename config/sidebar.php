<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dashboard Sidebar Menu
    |--------------------------------------------------------------------------
    |
    | Here you can define the sidebar menu for your application. It will be
    | displayed on the dashboard page. You can also specify the translation
    | key for each menu item.
    |
    */

    [
        'route' => 'dashboard.index',
        'icon' => 'fa fa-home',
        'title' => 'Dashboard',
    ],

    [
        'icon' => 'fa fa-globe',
        'title' => 'Website Management',

        'children' => [
            [
                'title' => 'Rooms',
                'icon' => 'fas fa-person-booth',
            ],

            [
                'title' => 'Reservations requests',
                'icon' => 'fas fa-calendar',
            ],

            [
                'title' => 'Reservations',
                'icon' => 'fas fa-calendar-check',
            ],
        ]
    ],

    [
        'icon' => 'fa fa-cog',
        'title' => 'Settings',

        'children' => [
            [
                'route' => 'dashboard.profile.edit',
                'title' => 'Profile',
            ],

            [
                'route' => 'dashboard.admins.index',
                'title' => 'Admins',
            ],
        ],
    ],
];
