<?php

namespace App\Blog\Category\Infra\DB\Interpretes;

use App\Blog\Category\Domain\CategoryFilter;
use App\Libs\Interpreter\DbInterpreter;
use Illuminate\Database\Eloquent\Builder;

class idFilterCategoryDbInterpreter extends DbInterpreter
{
	public function __construct(
		private CategoryFilter $filter
	) {
	}

	public function interpret(): Builder
	{
		$id = $this->filter->id();

		if (blank($id))
			return $this->query;

		return $this->query->where('id', $id);
	}
}
