@props([
    'code',
    'title',
    'subtitle',
    'description',
])

<div class="wd-error-page">
    <div class="container">
        <div class="wd-error-page__content">
            <span class="wd-error-page__code" aria-hidden="true">{{ $code }}</span>

            <h1 class="wd-error-page__title">{{ $title }}</h1>
            <p class="wd-error-page__subtitle">{{ $subtitle }}</p>
            <p class="wd-error-page__description">{{ $description }}</p>

            <form role="search" method="get" action="{{ route('shop.search') }}" class="wd-error-page__search">
                <input type="text" name="q" value="{{ request('q') }}"
                    placeholder="{{ __('Buscar publicaciones') }}" aria-label="{{ __('Buscar publicaciones') }}" />
                <button type="submit" aria-label="{{ __('Buscar') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="7"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
