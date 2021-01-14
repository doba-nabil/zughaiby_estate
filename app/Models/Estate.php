<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Arr;

class Estate extends Model implements Auditable
{
    use Sluggable , \OwenIt\Auditing\Auditable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $auditInclude = [
        'name',
        'address',
        'floors_count',
        'apartments_count',
        'empty_apartments_count',
        'rented_apartments_count',
        'paid',
        'unpaid',
        'exports',
        'imports',
        'user_id',
        'city_id',
    ];
    protected $auditTimestamps = true;
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
    public function reports()
    {
        return $this->hasMany('App\Models\Report','estate_id')->orderBy('id' , 'desc');
    }
    public function mainImage()
    {
        return $this->morphOne('App\Models\File', 'fileable', 'fileable_type', 'fileable_id')->where('type' , 'main');
    }

    public function transformAudit(array $data): array
    {
        if (Arr::has($data, 'old_values.user_id')) {
            $data['old_values']['user_name'] = User::find($this->getOriginal('user_id'))->name;
            $data['new_values']['user_name'] = User::find($this->getAttribute('user_id'))->name;
        }
        if (Arr::has($data, 'old_values.user_id')) {
            $data['old_values']['city_name'] = City::find($this->getOriginal('city_id'))->name;
            $data['new_values']['city_name'] = City::find($this->getAttribute('city_id'))->name;
        }
        if (Arr::has($data, 'new_values.user_id')) {
            $data['new_values']['user_name'] = User::find($this->getAttribute('user_id'))->name;
        }
        if (Arr::has($data, 'new_values.city_id')) {
            $data['new_values']['city_name'] = City::find($this->getAttribute('city_id'))->name;
        }
        return $data;
    }
}
