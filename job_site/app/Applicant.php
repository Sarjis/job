<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'first_name', 'email', 'last_name',
    ];
}
