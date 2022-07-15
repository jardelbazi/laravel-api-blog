<?php

namespace App\Libs\Interpreter;

use Illuminate\Database\Eloquent\Builder;

abstract class DbInterpreter
{
	protected Builder $query;

	abstract public function interpret(): Builder;

	public function setQuery(Builder $query): self
	{
		$this->query = $query;
		return $this;
	}
}
