<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if ( !$this->adminExists() ) {
            $this->call(AdminSeeder::class);
        }
        $this->call(AdminAccountSeeder::class);
    }

    protected function adminExists()
    {
        return Role::whereName('admin')->exists();
    }
}
