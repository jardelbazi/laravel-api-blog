<?php

namespace App\Blog\Category\Domain;

class CategoryUpdateData extends CategoryData
{
	public function __construct(
		protected int $id,
		string $name,
		?string $description,
		string $slug,
		bool $is_active
	) {
		parent::__construct(
			name: $name,
			description: $description,
			slug: $slug,
			is_active: $is_active
		);
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function toArray(): array
	{
		$array = parent::toArray();
		$array['id'] = $this->getId();
		return $array;
	}
}
