<?php

namespace App\Blog\Category\Infra\Http\Controllers;

use App\Blog\Category\Application\CategoryService;
use App\Blog\Category\Infra\Http\Adapters\RequestCategoryAdapter;
use App\Blog\Category\Infra\Http\Adapters\RequestCategoryFilterAdapter;
use App\Blog\Category\Infra\Http\Adapters\RequestCategoryUpdateAdapter;
use App\Blog\Category\Infra\Http\Resources\CategoryResource;
use App\Blog\Category\Infra\Http\Validators\CategoryUpdateValidator;
use App\Blog\Category\Infra\Http\Validators\CategoryValidator;
use App\Http\Controllers\Controller;
use App\Libs\Helpers\CollectionPaginator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
	public function __construct(
		private CategoryService $categoryService
	) {
	}

	public function store(Request $request): Response|Application|ResponseFactory
	{
		$validator = new CategoryValidator($request);
		$validator->validate();

		$content = new CategoryResource(
			$this->categoryService->create(new RequestCategoryAdapter($request))
		);

		return response($content, Response::HTTP_CREATED);
	}

	public function update(Request $request): CategoryResource
	{
		$validator = new CategoryUpdateValidator($request);
		$validator->validate();

		return new CategoryResource(
			$this->categoryService->update(new RequestCategoryUpdateAdapter($request))
		);
	}

	public function destroy(Request $request): Response|Application|ResponseFactory
	{
		$this->categoryService->delete(new RequestCategoryFilterAdapter($request));

		return response('', Response::HTTP_NO_CONTENT);
	}

	public function show(Request $request): CategoryResource
	{
		return new CategoryResource(
			$this->categoryService->getOneBy(new RequestCategoryFilterAdapter($request))
		);
	}

	public function index(Request $request): AnonymousResourceCollection
	{
		return CategoryResource::collection(
			resource: CollectionPaginator::paginate($this->categoryService->getCategories(new RequestCategoryFilterAdapter($request)))
		);
	}
}
