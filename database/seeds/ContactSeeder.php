<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    use TruncateTable;

    public function run()
    {
        $this->truncate('contacts');
        factory(\App\Models\Contact::class, 25)->create();
    }

}
