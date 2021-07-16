<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'fullname' => '山田太郎',
            'gender' => 1,
            'email' => 'sample01@test.com',
            'postcode' => '150-0001',
            'address' => '東京都渋谷区神宮前',
            'building_name' => '',
            'opinion' => 'お問い合わせのサンプルテキストです。',
        ];
        DB::table('contacts')->insert($param);
    }
}
