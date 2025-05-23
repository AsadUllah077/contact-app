<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory, SoftDeletes;
    protected $with = ['business'];
    protected $fillable =['firstname', 'lastname', 'phone', 'email','business_id'];
    public function business(){
        return $this->belongsTo(Buiness::class)->withTrashed();
    }
    public function tasks(){
        return $this->morphMany(Task::class, 'taskable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
