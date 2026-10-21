<?php

/**
 * Identité légale de l'éditeur du site.
 * Source unique pour mentions légales, footer, contact et conformité Merchant.
 */
return [

    'legal_name' => env('COMPANY_LEGAL_NAME', 'GROUPE DE SOCIETES CONTAINERS'),

    'trade_name' => env('COMPANY_TRADE_NAME', 'GSC'),

    'brand' => env('COMPANY_BRAND', 'GSC'),

    'legal_form' => env('COMPANY_LEGAL_FORM', 'SASU (Société par actions simplifiée unipersonnelle)'),

    'share_capital' => env('COMPANY_SHARE_CAPITAL', '500 €'),

    'siren' => env('COMPANY_SIREN', '983 871 658'),

    'siret' => env('COMPANY_SIRET', '983 871 658 00016'),

    'vat_number' => env('COMPANY_VAT', 'FR46983871658'),

    'rcs_city' => env('COMPANY_RCS_CITY', 'Pointe-à-Pitre'),

    'rcs_number' => env('COMPANY_RCS_NUMBER', '2024B00276'),

    'rcs_registration_date' => env('COMPANY_RCS_DATE', '09/02/2024'),

    'creation_date' => env('COMPANY_CREATION_DATE', '01/02/2024'),

    'naf_code' => env('COMPANY_NAF', '41.20B'),

    'naf_label' => env('COMPANY_NAF_LABEL', 'Construction d’autres bâtiments'),

    'activity' => env(
        'COMPANY_ACTIVITY',
        'Transformation, achat, ventes, location de conteneurs maritimes, construction de bâtiments divers.'
    ),

    'director_name' => env('COMPANY_DIRECTOR', 'Eric Carlos Hervé NICOLAS'),

    'director_title' => env('COMPANY_DIRECTOR_TITLE', 'Président'),

    'address_line1' => env('COMPANY_ADDRESS_LINE1', '5 Rue Nicolas Appert'),

    'address_line2' => env('COMPANY_ADDRESS_LINE2', 'ZI de Jarry (Lot n°5)'),

    'postal_code' => env('COMPANY_POSTAL_CODE', '97122'),

    'city' => env('COMPANY_CITY', 'Baie-Mahault'),

    'region' => env('COMPANY_REGION', 'Guadeloupe'),

    'country' => env('COMPANY_COUNTRY', 'France'),

    'country_code' => env('COMPANY_COUNTRY_CODE', 'FR'),

    'email' => env('COMPANY_EMAIL', 'contact@gsc-containers.com'),

    'phone' => env('COMPANY_PHONE', ''),

    'phone_display' => env('COMPANY_PHONE_DISPLAY', ''),

    'website' => env('COMPANY_WEBSITE', env('APP_URL', 'http://127.0.0.1:8000')),

    'publishing_director' => env('COMPANY_PUBLISHING_DIRECTOR', 'Eric Carlos Hervé NICOLAS'),

    'hosting_name' => env('COMPANY_HOSTING_NAME', 'o2switch'),

    'hosting_address' => env(
        'COMPANY_HOSTING_ADDRESS',
        '222-224 Boulevard Gustave Flaubert, 63000 Clermont-Ferrand, France'
    ),

    'hosting_website' => env('COMPANY_HOSTING_WEBSITE', 'https://www.o2switch.fr'),

    'mediator_name' => env('COMPANY_MEDIATOR_NAME', ''),

    'mediator_website' => env('COMPANY_MEDIATOR_WEBSITE', ''),

    'dpo_email' => env('COMPANY_DPO_EMAIL', ''),

    'iban' => env('COMPANY_IBAN', ''),

    'bic' => env('COMPANY_BIC', ''),

    'bank_name' => env('COMPANY_BANK_NAME', ''),

    /*
    | Livraison : France, Portugal, Espagne — forfait unique.
    */
    'shipping' => [
        'fee' => (float) env('COMPANY_SHIPPING_FEE', 400),
        'currency' => 'EUR',
        'zones' => ['PT', 'ES'],
        'preparation_days_min' => (int) env('COMPANY_SHIPPING_PREP_MIN', 2),
        'preparation_days_max' => (int) env('COMPANY_SHIPPING_PREP_MAX', 3),
        'delivery_days_min' => (int) env('COMPANY_SHIPPING_DELIVERY_MIN', 3),
        'delivery_days_max' => (int) env('COMPANY_SHIPPING_DELIVERY_MAX', 6),
    ],

    /*
    | Claims commerciaux affichés publiquement.
    | Laisser false tant que le service n'est pas réellement garanti
    | (politique Google Merchant : représentation trompeuse).
    */
    'claims' => [
        'free_shipping' => false,
        'warranty_years' => null,
    ],

];
