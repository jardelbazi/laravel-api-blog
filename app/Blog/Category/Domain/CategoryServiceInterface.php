<?php

namespace App\Blog\Category\Domain;

interface CategoryServiceInterface
{
	public function create(CategoryData $data): CategoryUpdateData;
	public function update(CategoryData $data): CategoryUpdateData;
	public function delete(CategoryFilter $filter): void;

	public function getOneBy(CategoryFilter $filter): CategoryUpdateData;
	/**
	 *
	 * @param CategoryFilter $filter
	 * @return CategoryUpdateData[]
	 */
	public function getCategories(CategoryFilter $filter): array;
}
