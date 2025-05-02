<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buiness extends Model
{
    /** @use HasFactory<\Database\Factories\BuinessFactory> */
    use HasFactory, SoftDeletes;
    protected $fillable = ['business_name', 'contact_email'];

    public function people(): HasMany
    {
        return $this->hasMany(Person::class);
    }

    public function categories(){
        return $this->belongsToMany(BusinessCategory::class, 'category_has_business');
    }

    public function tasks(){
        return $this->morphMany(Task::class, 'taskable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
