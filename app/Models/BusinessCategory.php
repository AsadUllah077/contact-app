<?php

namespace App\Models;

use App\Http\Requests\BusinessRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessCategory extends Model
{
    use SoftDeletes;
    public function business(){
        return $this->belongsToMany(Buiness::class, 'category_has_business');
    }
}
