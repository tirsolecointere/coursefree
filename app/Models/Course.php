<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];

    protected $withCount = ['students', 'reviews'];

    // course statuses
    const   DRAFT = 1,
            REVIEW = 2,
            PUBLISHED = 3;

    // get rating average
    public function getRatingAttribute() {
        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'), 1);
        } else {
            return 5;
        }
    }

    public function scopeCategory($query, $category_id) {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id) {
        if ($level_id) {
            return $query->where('level_id', $level_id);
        }
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    // One to one relation
    public function observation() {
        return $this->hasOne('App\Models\Observation');
    }

    // One to many relation
    public function reviews() {
        return $this->hasMany('App\Models\Review');
    }

    public function requirements() {
        return $this->hasMany('App\Models\Requirement');
    }

    public function goals() {
        return $this->hasMany('App\Models\Goal');
    }
    public function audiences() {
        return $this->hasMany('App\Models\Audience');
    }

    public function sections() {
        return $this->hasMany('App\Models\Section');
    }

    // One to many inverse relation
    public function teacher() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function level() {
        return $this->belongsTo('App\Models\Level');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function price() {
        return $this->belongsTo('App\Models\Price');
    }

    // Many to many relation
    public function students() {
        return $this->belongsToMany('App\Models\User');
    }

    // One to one polymorphic
    public function image() {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function lessons() {
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
}
