@php
    /** @var array<string, mixed> $company */
    $company = $company ?? config('company');
    $website = rtrim((string) ($company['website'] ?? config('app.url')), '/');
    $showTitle = $showTitle ?? true;
@endphp
@if ($showTitle)
    <p><strong>{{ __('Responsable del sitio web:') }}</strong></p>
@endif
<p><strong>{{ $company['legal_name'] }}</strong></p>
<p><strong>{{ __('SIRET:') }}</strong> {{ $company['siret'] }}</p>
<p><strong>{{ __('N° TVA:') }}</strong> {{ $company['vat_number'] }}</p>
<p><strong>{{ __('Domicilio social:') }}</strong>
    {{ $company['address_line1'] }}@if (! empty($company['address_line2'])), {{ $company['address_line2'] }}@endif,
    {{ $company['postal_code'] }} {{ $company['city'] }},
    {{ $company['region'] }}, {{ $company['country'] }}.
</p>
<p><strong>{{ __('Email:') }}</strong>
    <a href="mailto:{{ $company['email'] }}">{{ $company['email'] }}</a>
</p>
@if (! empty($company['phone_display']) || ! empty($company['phone']))
    @php $phoneHref = preg_replace('/\s+/', '', (string) ($company['phone'] ?: $company['phone_display'])); @endphp
    <p><strong>{{ __('Teléfono:') }}</strong>
        <a href="tel:{{ $phoneHref }}">{{ $company['phone_display'] ?: $company['phone'] }}</a>
    </p>
@endif
<p><strong>{{ __('Sitio web:') }}</strong>
    <a href="{{ $website }}">{{ $website }}</a>
</p>
