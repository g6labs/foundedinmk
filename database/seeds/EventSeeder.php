<?php

use G6\FoundedInMk\Entities\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
			"title_en"			=> "Startup Co. won $100.000 prize!",
	    	"title_local"		=> "Startup Co. won $100.000 prize!",
	    	"description_en"	=> "Macedonians are no strangers to tough times — It is a part of our everyday lives. However, Macedonia has a growing startup scene and talented population excited about tech.",
	    	"description_local"	=> "Macedonians are no strangers to tough times — It is a part of our everyday lives. However, Macedonia has a growing startup scene and talented population excited about tech.",
	    	"action_text_en"	=> "Read more",
	    	"action_text_local"	=> "Read more",
	    	"action_url"		=> "http://foundedin.mk",
	    	"event_date"		=> 0315,
	    	"slug"				=> "startup-co-won-100000-prize",
	    	"approved"			=> true,
        ]);
    }
}