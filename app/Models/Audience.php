<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // One to many inverse relation
    public function course() {
        return $this->belongsTo('App\Models\Course');
    }
}
