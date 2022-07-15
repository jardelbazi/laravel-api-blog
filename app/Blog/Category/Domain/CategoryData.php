<?php

namespace App\Blog\Category\Domain;

use App\Libs\Traits\SetField;
use Illuminate\Contracts\Support\Arrayable;

abstract class CategoryData implements Arrayable
{
	use SetField;

    public function __construct(
        protected string $name,
        protected ?string $description = null,
        protected string $slug,
        protected bool $is_active = true,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

	public function getSlug(): string
	{
		return $this->slug;
	}

	public function getIsActive(): bool
	{
		return $this->is_active;
	}

	public function toArray(): array
	{
		return [
			'name' => $this->getName(),
			'description' => $this->getDescription(),
			'slug' => $this->getSlug(),
			'isActive' => $this->getIsActive(),
		];
	}
}
