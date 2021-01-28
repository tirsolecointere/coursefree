<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const   LIKE = 1,
            DISLIKE = 2;

    // One to many inverse relation
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    // morphed relation
    public function reactionable() {
        return $this->morphTo();
    }
}
