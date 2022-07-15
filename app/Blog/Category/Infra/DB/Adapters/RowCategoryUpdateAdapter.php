<?php

namespace App\Blog\Category\Infra\DB\Adapters;

use App\Blog\Category\Domain\CategoryUpdateData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class RowCategoryUpdateAdapter extends CategoryUpdateData
{
	public function __construct(
		private Model $category
	) {
		parent::__construct(
			id: $category->id,
			name: $category->name,
			description: $category->description,
			slug: $category->slug,
			is_active: $category->is_active
		);
	}

	public static function of(Model $category): self
	{
		return new self($category);
	}

	/**
	 *
	 * @param array|Collection $categories
	 * @return RowCategoryUpdateAdapter[]
	 */
	public static function collection(array | Collection $categories): array
	{
		return collect($categories)->mapInto(self::class)->all();
	}
}
