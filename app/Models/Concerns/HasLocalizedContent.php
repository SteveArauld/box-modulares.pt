<?php

namespace App\Models\Concerns;

trait HasLocalizedContent
{
    public function translatedValue(string $key, ?string $locale = null, string $fallback = 'es'): ?string
    {
        $locale = $locale ?: app()->getLocale();

        $value = $this->getTranslation($key, $locale, false);

        if (filled($value)) {
            return $value;
        }

        return $this->getTranslation($key, $fallback, false) ?: null;
    }
}
