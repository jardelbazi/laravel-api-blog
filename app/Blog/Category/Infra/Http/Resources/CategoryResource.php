<?php

namespace App\Blog\Category\Infra\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
	public function toArray($request): array
	{
		return $this->resource->toArray();
	}
}
