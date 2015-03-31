<?php namespace G6\FoundedInMk\Repositories;

abstract class FoundedInRepository
{
  	protected $model;

 	protected function make()
 	{
 		return new $this->model;
 	}

 	public function all()
 	{
 		return $this->make()->all();
 	}
}
