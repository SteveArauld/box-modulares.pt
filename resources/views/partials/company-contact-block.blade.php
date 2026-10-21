@php
    /** @var array<string, mixed> $company */
    $company = $company ?? config('company');
    $website = rtrim((string) ($company['website'] ?? config('app.url')), '/');
@endphp
<p><strong>{{ $company['legal_name'] }}</strong> ({{ $company['trade_name'] }})</p>
<p>
    {{ $company['address_line1'] }}@if (! empty($company['address_line2'])), {{ $company['address_line2'] }}@endif<br>
    {{ $company['postal_code'] }} {{ $company['city'] }}<br>
    {{ $company['region'] }}, {{ $company['country'] }}
</p>
<p>
    <strong>{{ __('SIRET') }} :</strong> {{ $company['siret'] }}<br>
    <strong>{{ __('TVA') }} :</strong> {{ $company['vat_number'] }}
</p>
<p>
    <strong>{{ __('Email') }} :</strong>
    <a href="mailto:{{ $company['email'] }}">{{ $company['email'] }}</a>
</p>
@if (! empty($company['phone_display']) || ! empty($company['phone']))
    @php $phoneHref = preg_replace('/\s+/', '', (string) ($company['phone'] ?: $company['phone_display'])); @endphp
    <p>
        <strong>{{ __('Téléphone') }} :</strong>
        <a href="tel:{{ $phoneHref }}">{{ $company['phone_display'] ?: $company['phone'] }}</a>
    </p>
@endif
<p>
    <strong>{{ __('Site web') }} :</strong>
    <a href="{{ $website }}">{{ $website }}</a>
</p>
