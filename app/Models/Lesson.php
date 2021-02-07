<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getCompletedAttribute() {
        return $this->users->contains(auth()->user());
    }

    // One to one relation
    public function description() {
        return $this->hasOne('App\Models\Description');
    }

    // One to many inverse relation
    public function section() {
        return $this->belongsTo('App\Models\Section');
    }

    public function platform() {
        return $this->belongsTo('App\Models\Platform');
    }

    // Many to many relation
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }

    // One to one polymorphic
    public function resource() {
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    // One to many polymorphic
    public function comments() {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions() {
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}
