<?php

namespace bbook;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Table Name 
    protected $table = 'items';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamp
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('bbook\User');
    }

    public function likes()
    {
        return $this->morphToMany('bbook\User', 'likeable')->whereDeletedAt(null);
    }

    // public function getIsLikedAttribute()
    // {
    //     $like = $this->likes()->whereUserId(Auth::id())->first();
    //     return (!is_null($like)) ? true : false;
    // }
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
