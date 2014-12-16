<?php

namespace G6\FoundedInMk\Entities;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    protected $table = "startups";
    protected $fillable = ["name", "founded", "url", "twitter", "logo", "contact_name", "contact_email"];
    protected $hidden = ["contact_name", "contact_email"];
}
