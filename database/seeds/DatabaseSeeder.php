<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'cache',
            'jobs',
            'sessions',
        ]);

        $this->call(AuthTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(SettingItemsSeeder::class);
        $this->call(PageSeeder::class);

        Model::reguard();
    }
}
