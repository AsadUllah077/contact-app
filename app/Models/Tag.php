<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDelete;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    //
    use SoftDeletes;
    public function people(){
        return $this->morphedByMany(Person::class, 'taggable');
    }

    public function businesses(){
        return $this->morphedByMany(Buiness::class, 'taggable');
    }
}
