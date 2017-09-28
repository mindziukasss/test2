<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends CoreModel
{
    /**
     * Database table name
     * @var string
     */
    protected $table = 'posts';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id','user_id', 'title', 'body', 'image'];
}
