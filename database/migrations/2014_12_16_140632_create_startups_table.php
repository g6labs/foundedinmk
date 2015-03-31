<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('startups', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->integer('founded');
            $table->string('url');
            $table->string('twitter');
            $table->string('logo_url');
            $table->string('logo')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->boolean('approved')->default(false);
            $table->boolean('featured')->default(false);
			$table->timestamps();

            /**
             * @todo Add index on url field it it's used for searching and linking to startups
             */
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('startups');
	}

}
