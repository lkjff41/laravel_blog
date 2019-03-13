<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all()->pluck('tag')->all();
        Post::truncate();  // 先清理表数据
        DB::table('post_tag_pivot')->truncate();
        factory(Post::class,20)->create()->each(function ($post) use ($tags){
            if (mt_rand(1,100)<=30){
                return;
            }
            shuffle($tags);
            $postTags = [$tags[0]];
            if (mt_rand(1,100)<=30){
                $postTags[] = $tags[1];
            }
            $post->syncTags($postTags);
        });
    }
}
