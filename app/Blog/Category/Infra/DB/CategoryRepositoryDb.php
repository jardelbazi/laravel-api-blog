<?php

namespace App\Blog\Category\Infra\DB;

use App\Blog\Category\Domain\CategoryData;
use App\Blog\Category\Domain\CategoryFilter;
use App\Blog\Category\Domain\CategoryRepository;
use App\Blog\Category\Domain\CategoryUpdateData;
use App\Blog\Category\Infra\DB\Adapters\RowCategoryUpdateAdapter;
use App\Blog\Category\Infra\DB\Interpretes\idFilterCategoryDbInterpreter;
use App\Blog\Category\Infra\DB\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class CategoryRepositoryDb extends CategoryRepository
{
	public function create(CategoryData $data): ?CategoryUpdateData
	{
		return RowCategoryUpdateAdapter::of(Category::create($data->toArray()));
	}
    public function update(CategoryUpdateData $data): CategoryUpdateData
	{
		$category = Category::find($data->getId());

		if (blank($category))
			return null;

		$category->fill($data->onlyModifiedData());
		$category->save();

		return RowCategoryUpdateAdapter::of($category);
	}

    public function delete(CategoryFilter $filter): void
	{
		$this->getQuery($filter)->delete();
	}

    public function getOneBy(CategoryFilter $filter): ?CategoryUpdateData
	{
		$category = $this->getQuery($filter)->first();

		if (blank($category))
			return null;

		return RowCategoryUpdateAdapter::of($category);
	}

    public function getCategories(CategoryFilter $filter): array
	{
		$categories = $this->getQuery($filter)->get();

		if (blank($categories))
			return [];

		return RowCategoryUpdateAdapter::collection($categories);
	}

	public function getQuery(CategoryFilter $filter): Builder
	{
		$query = Category::query();

		$interpreters = [
			new idFilterCategoryDbInterpreter($filter),
		];

		foreach ($interpreters as $interpreter)
			$query = $interpreter->setQuery($query)->interpret();

		return $query;
	}
}
