<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Estate extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function scopeActive($query)
    {
        return $query->where('active' , 1);
    }
    public function getActive()
    {
        return  $this->active == 1 ? 'فعال' : 'غير فعال';
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function mainImage()
    {
        return $this->morphOne('App\Models\File', 'fileable', 'fileable_type', 'fileable_id')->where('type' , 'main');
    }
}
