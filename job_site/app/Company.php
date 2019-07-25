<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'first_name', 'email', 'last_name','business_name'
    ];
}
