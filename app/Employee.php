<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['firstname', 'lastname', 'company', 'email', 'phone'];

    public function company(){
        return $this->belongsTo("App\Company", 'company', 'id');
    }
}
