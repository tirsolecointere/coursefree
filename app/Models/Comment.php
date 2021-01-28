<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // One to many inverse relation
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    // morphed relation
    public function commentable() {
        return $this->morphTo();
    }

    // One to many polymorphic
    public function comments() {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions() {
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}
