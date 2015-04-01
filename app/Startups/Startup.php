<?php

namespace G6\FoundedInMk\Startups;

use G6\FoundedInMk\Core\Entity;

class Startup extends Entity
{
    protected $table = "startups";
    protected $fillable = ["name", "founded", "url", "twitter", "logo_url", "contact_name", "contact_email"];
    protected $hidden = ["contact_name", "contact_email"];
}
