<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title_en');
            $table->string('title_local');

            $table->text('description_en');
            $table->text('description_local');

            $table->string('action_text_en');
            $table->string('action_text_local');

            $table->string('action_url');

            $table->integer('event_date');

            $table->string('slug');

        	$table->boolean('approved')->default(true);
        	$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
