<?php

use Illuminate\Database\Seeder;
use Faker\Provider\DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CampsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $camps = [
            [
                'id' => '1',
                'title' => 'テストタイトル１',
                'user_id' => '1',
                'discription' => 'テストコメントです',
                'location' => 'hogeキャンプ場',
            ],

            [
                'id' => '2',
                'title' => 'テストタイトル2',
                'user_id' => '2',
                'discription' => 'テストコメントです',
                'location' => 'piyoキャンプ場',
            ],

            [
                'id' => '3',
                'title' => 'テストタイトル3',
                'user_id' => '3',
                'discription' => 'テストコメントです',
                'location' => 'fugaキャンプ場',
            ],

            [
                'id' => '4',
                'title' => 'テストタイトル4',
                'user_id' => '2',
                'discription' => 'テストコメントです',
                'location' => 'fooキャンプ場',
            ],

            [
                'id' => '5',
                'title' => 'テストタイトル5',
                'user_id' => '3',
                'discription' => 'テストコメントです',
                'location' => 'barキャンプ場',
            ],
        ];

        foreach ($camps as $camp) {
            DB::table('camps')->insert([
                'id' => $camp['id'],
                'title' => $camp['title'],
                'user_id' => $camp['user_id'],
                'discription' => $camp['discription'],
                'location' => $camp['location'],
                'date' => DateTime::dateTimeThisDecade(), 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}