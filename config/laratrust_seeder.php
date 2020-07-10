<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
   // 'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
   // 'truncate_tables' => true,

    'role_structure' => [
        'super_admin' => [
            'categories' => 'c,r,u,d',
            'authors'=>'c,r,u,d',
            'books'=>'c,r,u,d',
            'roles' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'settings' => 'c,r',
            'aboutus' => 'c,r',
            'contactus' => 'c,r,u,d',
        ],
        'admin' => [],
        'user' => [],
    ],
    'permission_structure' => [

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
