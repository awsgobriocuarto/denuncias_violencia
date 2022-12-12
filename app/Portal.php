<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Portal extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'slug', 'description','state'
    ];

    public function users() {
        return $this->belongsToMany(User::Class);
    }

    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
    public function sluggable(): array
    {
                
        return [
            'slug' => [
                'source' => ['name'],
                'onUpdate' => true
            ]
        ];
    }
}
