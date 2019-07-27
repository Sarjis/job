<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'Job_title', 'Job_description', 'salary','location','country','user_id'
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function applicant()
    {
        return $this->belongsTo(User::class,'applicant_id');
    }
}
