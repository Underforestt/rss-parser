<?php

namespace App\Services;

use App\Models\Post;
use DB;
use Vedmant\FeedReader\Facades\FeedReader;

class RssParser implements IParser
{
    public function parse(string $url): void{
        $feed = FeedReader::read($url);
        $latestPost = Post::latestPost();
        foreach ($feed->get_items() as $item){
            $currentItemPubDate = $item->get_date('Y-m-d H:i:s');
            if (!$latestPost || ($latestPost->pub_date < $currentItemPubDate && $item->get_title() != $latestPost->title)){
                Post::create([
                    'title' => $item->get_title(),
                    'body' => $item->get_description(),
                    'pub_date' => $currentItemPubDate,
                ]);
            }
        }
    }
}
