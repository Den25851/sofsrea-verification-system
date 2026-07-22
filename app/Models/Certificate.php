<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'member_id',
        'certificate_number',
        'certificate_title',
        'issue_date',
        'expiry_date',
        'status',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // Generate the public verification URL
    public function verificationUrl()
    {
        return url('/verify/' . $this->certificate_number);
    }
}