<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Settings Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default settings store that gets used while
    | using this settings library.
    |
    | Supported: "json", "database"
    |
    */
    'store'       => env("SETTING_STORE_DRIVER", 'json'),

    /*
    |--------------------------------------------------------------------------
    | JSON Store
    |--------------------------------------------------------------------------
    |
    | If the store is set to "json", settings are stored in the defined
    | file path in JSON format. Use full path to file.
    |
    */
    'path'        => storage_path() . '/settings.json',

    /*
    |--------------------------------------------------------------------------
    | Database Store
    |--------------------------------------------------------------------------
    |
    | The settings are stored in the defined file path in JSON format.
    | Use full path to JSON file.
    |
    */
    // If set to null, the default connection will be used.
    'connection'  => env('SETTING_CONNECTION', null),
    'table'       => env('SETTING_TABLE', 'settings'),
    'keyColumn'   => env('SETTING_TABLE_COLUMN_KEY', 'key'),
    'valueColumn' => env('SETTING_TABLE_COLUMN_VALUE', 'value'),
];
