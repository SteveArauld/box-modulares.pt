<?php

namespace App\Models;

use App\Models\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasLocalizedContent, HasTranslations;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'sku',
        'on_sale',
        'prices',
        'images',
        'attributes',
        'featured_position',
    ];

    public array $translatable = [
        'name',
        'slug',
        'short_description',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'on_sale' => 'boolean',
            'prices' => 'array',
            'images' => 'array',
            'attributes' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Compatibility accessor: the catalog is single-category per product,
     * but the product card markup iterates a collection.
     *
     * @return Attribute<Collection<int, Category>, never>
     */
    protected function categories(): Attribute
    {
        return Attribute::get(fn (): Collection => $this->category
            ? collect([$this->category])
            : collect());
    }

    /**
     * @return Attribute<Collection<int, object{path: string}>, never>
     */
    protected function gallery(): Attribute
    {
        return Attribute::get(fn (): Collection => collect($this->images ?? [])
            ->filter(fn ($image) => filled($image['path'] ?? null))
            ->map(fn ($image) => (object) ['path' => $image['path']])
            ->values());
    }

    protected function coverImage(): Attribute
    {
        return Attribute::get(fn (): ?string => $this->gallery->first()?->path);
    }

    protected function isInStock(): Attribute
    {
        return Attribute::get(fn (): bool => true);
    }

    protected function isPurchasable(): Attribute
    {
        return Attribute::get(fn (): bool => $this->price > 0);
    }

    protected function sourceId(): Attribute
    {
        return Attribute::get(fn (): int => $this->id);
    }

    protected function price(): Attribute
    {
        return Attribute::get(function (): float {
            $cents = $this->prices['sale_price'] ?? $this->prices['price'] ?? 0;

            return round(((float) $cents) / 100, 2);
        });
    }

    protected function regularPrice(): Attribute
    {
        return Attribute::get(function (): float {
            $cents = $this->prices['regular_price'] ?? $this->prices['price'] ?? 0;

            return round(((float) $cents) / 100, 2);
        });
    }
}
