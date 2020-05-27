<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Rename Table name
    protected $table = 'posts';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamp
    public $timestamps = true;


}
