<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'pub_date',
    ];

    public $timestamps = false;

    public static function latestPost(){
        return DB::table('posts')->orderBy('pub_date', 'desc')->first();
    }
}
