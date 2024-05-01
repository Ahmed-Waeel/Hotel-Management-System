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
        'locales' => [
            'en' => 'Dashboard',
            'ar' => 'لوحة التحكم',
        ],
    ],

    [
        'icon' => 'fa fa-globe',
        'locales' => [
            'en' => 'Website Management',
            'ar' => 'إدارة الموقع',
        ],

        'children' => [
            [

            ],
        ],
    ],

    [
        'icon' => 'fa fa-cog',
        'locales' => [
            'en' => 'Settings',
            'ar' => 'الإعدادات',
        ],

        'children' => [
            [
                'route' => 'dashboard.profile.edit',
                'locales' => [
                    'en' => 'Profile',
                    'ar' => 'الملف الشخصي',
                ],
            ],

            [
                'route' => 'dashboard.admins.index',
                'locales' => [
                    'en' => 'Admins',
                    'ar' => 'المشرفين',
                ],
            ],
        ],
    ],
];
