<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment();
        $comment->id_user='2';
        $comment->id_product="1";
        $comment->cmt="I love it.";
        $comment->save();
    }
}