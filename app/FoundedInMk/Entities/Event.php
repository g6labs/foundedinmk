<?php

namespace G6\FoundedInMk\Entities;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";
    protected $fillable = ["name", "founded", "url", "twitter", "logo_url", "contact_name", "contact_email"];
    protected $hidden = ["contact_name", "contact_email"];
}
