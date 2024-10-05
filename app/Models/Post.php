<?php
namespace App\Models;


use MongoDB\Laravel\Eloquent\Model;

class Post extends Model
{
    protected $collection = 'blog_posts';    
}
