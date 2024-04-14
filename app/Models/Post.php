<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $post;

    // public function __construct(Post $post)
    // {
    //     $this->post = $post;
    // }/

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
