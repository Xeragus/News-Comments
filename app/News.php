<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['news_title', 'news_description', 'news_link', 'num_upvotes'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment(Comment $comment)
    {
        $this->comments()->save($comment);
    }
}