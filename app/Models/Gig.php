<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "company_name",
        "job_title",
        "job_location",
        "company_email",
        "company_website",
        "job_description",
        "company_logo"
    ];

    protected $perPage = 4;


    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
