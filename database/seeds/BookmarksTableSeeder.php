<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSet = [
            [
                'user_id' => 1,
                'post_id' => 1
            ],
            [
                'user_id' => 1,
                'post_id' => 2
            ],
            [
                'user_id' => 2,
                'post_id' => 1
            ],
            [
                'user_id' => 2,
                'post_id' => 3
            ],
            
        ];

        DB::table('bookmarks')->insert($dataSet);
    }
}
