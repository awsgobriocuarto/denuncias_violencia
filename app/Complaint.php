<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    public function person() {
        return $this->belongsTo(Person::Class);
    }
}
