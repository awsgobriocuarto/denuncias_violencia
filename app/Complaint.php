<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'type_of_violence', 'person_id', 'portal_id','user_id'
    ];
    
    
    public function person() {
        return $this->belongsTo(Person::Class);
    }

    public function user() {
        return $this->belongsTo(User::Class);
    }

    public function portal() {
        return $this->belongsTo(Portal::Class);
    }
}
