<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGroupSeeder extends Seeder
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
                'title' => 'Admin',
            ],
            [
                'title' => 'Editör',
            ],

        ];

        foreach ($groups as $group) {
            $check = null;
            $check = DB::table('user_groups')->where('title', $group['title'])->first();
            if ($check === null) {
                $group['created_at'] = now();
                $group['updated_at'] = now();
                DB::table('user_groups')->insert($group);
            } else {
                $group['updated_at'] = now();
                DB::table('user_groups')->where('id', $check->id)->update($group);
            }
        }
    }
}
