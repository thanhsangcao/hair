<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Salon;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'stylist',
                'guard_name' => 'web',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'customer',
                'guard_name' => 'web',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        ]);

        $salon = Salon::create([
            'name' => 'Admin',
            'address' => 'Admin'
        ]);

        $user = User::create([
            'name' => 'admin',
            'password' => 'admin123',
            'email' => 'admin@gmail.com',
            'phone_number' => 123,
            'address' => 'admin',
            'salon_id' => $salon->id,
            'permission' => 1,
        ]);
        $user->assignRole('admin');
    }
}
