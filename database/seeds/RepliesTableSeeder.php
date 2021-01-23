<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;

class RepliesTableSeeder extends Seeder
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
                'user_id' => 2,
                'post_id' => 1,
                'body' => 'ミニブログデビューおめでとう！',
            ],
            [
                'user_id' => 1,
                'post_id' => 1,
                'body' => 'ありがとう！',
            ],
            [
                'user_id' => 1,
                'post_id' => 3,
                'body' => 'ユーザーID: 1 の返信だよ',
            ],
        ];

        foreach ($dataSet as $data) {
            Reply::create($data);
        }
    }
}
