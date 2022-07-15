<?php

namespace App\Blog\Category\Domain;

abstract class CategoryRepository
{
	abstract public function create(CategoryData $data): ?CategoryUpdateData;
	abstract public function update(CategoryUpdateData $data): CategoryUpdateData;
	abstract public function delete(CategoryFilter $filter): void;

	abstract public function getOneBy(CategoryFilter $filter): ?CategoryUpdateData;

	/**
	 *
	 * @param CategoryFilter $filter
	 * @return CategoryUpdateData[]
	 */
	abstract public function getCategories(CategoryFilter $filter): array;
}
