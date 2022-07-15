<?php

namespace App\Blog\Category\Application;

use App\Blog\Category\Domain\CategoryData;
use App\Blog\Category\Domain\CategoryFilter;
use App\Blog\Category\Domain\CategoryRepository;
use App\Blog\Category\Domain\CategoryServiceInterface;
use App\Blog\Category\Domain\CategoryUpdateData;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class CategoryService implements CategoryServiceInterface
{
	public function __construct(
		private CategoryRepository $categoryRepository,
	)
	{
	}

	public function create(CategoryData $data): CategoryUpdateData
	{
		return $this->categoryRepository->create($data);
	}

	public function update(CategoryData $data): CategoryUpdateData
	{
		$category = $this->categoryRepository->update($data);
		throw_if(blank($category), NotFound::class, CategoryUpdateData::class);

		return $category;
	}

	public function delete(CategoryFilter $filter): void
	{
		$this->categoryRepository->delete($filter);
	}

	public function getOneBy(CategoryFilter $filter): CategoryUpdateData
	{
		$category = $this->categoryRepository->getOneBy($filter);
		throw_if(blank($category), NotFound::class, $filter);

		return $category;
	}

	public function getCategories(CategoryFilter $filter): array
	{
		return $this->categoryRepository->getCategories($filter);
	}
}
