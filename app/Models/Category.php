<?php

namespace App\Models;

use App\Models\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasLocalizedContent, HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public array $translatable = [
        'name',
        'slug',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
