<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

        //thu muc product 
        'google_drive' => [
            'driver' => 'google_drive',
            'clientId' => '724549789014-p4jauk64b4ouss2ntlljbcb55udbs9f8.apps.googleusercontent.com',
            'clientSecret' => 'YRQVXzGC-cPd0uUBP-lvmbkj',
            'refreshToken' => '1//04sNZcON_6orGCgYIARAAGAQSNwF-L9IraAx4B5NldedwBY5QLVfBsMU_GihAXbQUawiLWVkCJJUBEGTkOtWL2W4BchktjPlnDN8',
            'folderId' => '1iuso5O6fepnoViK679d9EplkVHmN-UvY',
        ],
        //large
        'large_google_drive' => [
            'driver' => 'large_google_drive',
            'clientId' => '724549789014-p4jauk64b4ouss2ntlljbcb55udbs9f8.apps.googleusercontent.com',
            'clientSecret' => 'YRQVXzGC-cPd0uUBP-lvmbkj',
            'refreshToken' => '1//04sNZcON_6orGCgYIARAAGAQSNwF-L9IraAx4B5NldedwBY5QLVfBsMU_GihAXbQUawiLWVkCJJUBEGTkOtWL2W4BchktjPlnDN8',
            'folderId' => '1Q7gpPodh56tCp1cY4mJ35F-mL7mW5ozH',
        ],
        //medium
        'medium_google_drive' => [
            'driver' => 'medium_google_drive',
            'clientId' => '724549789014-p4jauk64b4ouss2ntlljbcb55udbs9f8.apps.googleusercontent.com',
            'clientSecret' => 'YRQVXzGC-cPd0uUBP-lvmbkj',
            'refreshToken' => '1//04sNZcON_6orGCgYIARAAGAQSNwF-L9IraAx4B5NldedwBY5QLVfBsMU_GihAXbQUawiLWVkCJJUBEGTkOtWL2W4BchktjPlnDN8',
            'folderId' => '1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA',
        ],
        //small
        'small_google_drive' => [
            'driver' => 'small_google_drive',
            'clientId' => '724549789014-p4jauk64b4ouss2ntlljbcb55udbs9f8.apps.googleusercontent.com',
            'clientSecret' => 'YRQVXzGC-cPd0uUBP-lvmbkj',
            'refreshToken' => '1//04sNZcON_6orGCgYIARAAGAQSNwF-L9IraAx4B5NldedwBY5QLVfBsMU_GihAXbQUawiLWVkCJJUBEGTkOtWL2W4BchktjPlnDN8',
            'folderId' => '19_X0lc8GknbdDeEJ1vDo4ve7N2uPEaXs',
        ],  

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
