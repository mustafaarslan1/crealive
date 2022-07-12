<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            [
                'name' => 'Mustafa',
                'email' => 'admin@crealive.com',
                'group_id' => 1,
                'password' => Hash::make('12341234'),
            ],
            [
                'name' => 'Editör',
                'email' => 'editor@crealive.com',
                'group_id' => 2,
                'password' => Hash::make('12341234'),
            ],

        ];

        foreach ($groups as $group) {
            $check = null;
            $check = DB::table('users')->where('email', $group['email'])->first();
            if ($check === null) {
                $group['created_at'] = now();
                $group['updated_at'] = now();
                DB::table('users')->insert($group);
            } else {
                $group['updated_at'] = now();
                DB::table('users')->where('id', $check->id)->update($group);
            }
        }
    }
}
