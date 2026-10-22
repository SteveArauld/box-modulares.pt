@php
    /** @var array<string, mixed> $company */
    $company = $company ?? config('company');
    $website = rtrim((string) ($company['website'] ?? config('app.url')), '/');
@endphp

<h2>{{ __('1. Identification de l’éditeur') }}</h2>
<p>{{ __('Conformément aux articles 6-III et 19 de la Loi n°2004-575 du 21 juin 2004 pour la Confiance dans l’Économie Numérique, les présentes Mentions légales ont pour objet d’informer les utilisateurs du site de l’identité des différents intervenants dans le cadre de sa réalisation et de son suivi.') }}</p>

<p><strong>{{ __('Raison sociale :') }}</strong> {{ $company['legal_name'] }}</p>
<p><strong>{{ __('Enseigne / marque :') }}</strong> {{ $company['trade_name'] }} ({{ $company['brand'] }})</p>
<p><strong>{{ __('Forme juridique :') }}</strong> {{ $company['legal_form'] }}</p>
<p><strong>{{ __('Capital social :') }}</strong> {{ $company['share_capital'] }}</p>
<p><strong>{{ __('SIREN :') }}</strong> {{ $company['siren'] }}</p>
<p><strong>{{ __('SIRET :') }}</strong> {{ $company['siret'] }}</p>
<p><strong>{{ __('N° TVA intracommunautaire :') }}</strong> {{ $company['vat_number'] }}</p>
<p><strong>{{ __('RCS :') }}</strong> {{ $company['rcs_city'] }} {{ $company['rcs_number'] }}
    @if (! empty($company['rcs_registration_date']))
        ({{ __('immatriculation du') }} {{ $company['rcs_registration_date'] }})
    @endif
</p>
<p><strong>{{ __('Code NAF :') }}</strong> {{ $company['naf_code'] }} — {{ $company['naf_label'] }}</p>
<p><strong>{{ __('Activité :') }}</strong> {{ $company['activity'] }}</p>
<p><strong>{{ __('Siège social :') }}</strong>
    {{ $company['address_line1'] }}@if (! empty($company['address_line2'])), {{ $company['address_line2'] }}@endif,
    {{ $company['postal_code'] }} {{ $company['city'] }},
    {{ $company['region'] }},
    {{ $company['country'] }}
</p>
<p><strong>{{ $company['director_title'] }} :</strong> {{ $company['director_name'] }}</p>
<p><strong>{{ __('Directeur de la publication :') }}</strong> {{ $company['publishing_director'] }}</p>
<p><strong>{{ __('Email :') }}</strong>
    <a href="mailto:{{ $company['email'] }}">{{ $company['email'] }}</a>
</p>
@if (! empty($company['phone_display']) || ! empty($company['phone']))
    <p><strong>{{ __('Téléphone :') }}</strong>
        @php $phoneHref = preg_replace('/\s+/', '', (string) ($company['phone'] ?: $company['phone_display'])); @endphp
        <a href="tel:{{ $phoneHref }}">{{ $company['phone_display'] ?: $company['phone'] }}</a>
    </p>
@endif
<p><strong>{{ __('Site web :') }}</strong>
    <a href="{{ $website }}">{{ $website }}</a>
</p>
<p>{{ __('Ci-après, « l’Éditeur » ou « le Vendeur ».') }}</p>
