<?php

namespace G6\FoundedInMk\Events;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";

    protected $fillable = [
    	"type",
    	"title_en",
    	"title_local",
    	"description_en",
    	"description_local",
    	"action_text_en",
    	"action_text_local",
    	"action_url",
    	"event_date",
    	"slug",
    	"approved",
	];

    protected $hidden = ["approved"];
}
