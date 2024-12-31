<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AccountTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('account_type')->insert([
            ['type_name' => 'Admin', 'description' => 'Akun dengan akses penuh untuk mengelola sistem.'],
            ['type_name' => 'User', 'description' => 'Akun standar untuk pengguna biasa.'],
            ['type_name' => 'Guest', 'description' => 'Akun dengan akses terbatas.'],
        ]);
    }
}
