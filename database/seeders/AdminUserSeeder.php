<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        if (!User::where('username', 'adminkabupaten')->exists()) {
            User::create([
                'name' => 'Admin Kabupaten Toba',
                'email' => 'adminkabupaten@toba.com',
                'username' => 'adminkabupaten',
                'password' => Hash::make('masuk123'),
                'role' => 'kabupaten',
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // 1. ADMIN KABUPATEN (Role: kabupaten)
        User::create([
            'name' => 'Admin Kabupaten Toba',
            'email' => 'adminkabupaten@toba.com',
            'username' => 'adminkabupaten',
            'password' => Hash::make('masuk123'),
            'role' => 'kabupaten' 
        ]);

        // 2. ADMIN DESA (Role: desa)
        User::create([
            'name' => 'Admin Desa Sample',
            'email' => 'admindesa@toba.com',
            'username' => 'admindesa',
            'password' => Hash::make('masuk123'),
            'role' => 'desa' 
        ]);
    }
}