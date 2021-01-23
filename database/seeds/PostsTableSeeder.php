<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
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
                'body' => '投稿1'
            ],
            [
                'user_id' => 1,
                'body' => '投稿2'
            ],
            [
                'user_id' => 2,
                'body' => '投稿3'
            ],
        ];
        foreach ($dataSet as $data) {
            Post::create($data);
        }
    }
}
