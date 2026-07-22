<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'member_number',
        'full_name',
        'email',
        'phone',
        'organization',
        'status',
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}