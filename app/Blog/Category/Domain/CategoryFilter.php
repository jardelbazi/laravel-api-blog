<?php

namespace App\Blog\Category\Domain;

use DeepCopy\Filter\Filter;

abstract class CategoryFilter
{
	public function __construct(
		protected ?int $id,
	) {
	}

	public function id(): ?int
	{
		return $this->id;
	}
}
