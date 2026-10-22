@extends('layouts.app')

@section('title', __('Mentions légales').' | '.config('app.name'))

@section('content')
	<div class="wd-page-content main-page-wrapper">

			<link rel="stylesheet" id="wd-page-title-css"
				href={{ asset('/wp-content/themes/woodmart/css/parts/page-title8833.css') }} type="text/css"
				media="all" />
			<div class="wd-page-title page-title  page-title-default title-size-small title-design-default color-scheme-light"
				style="">
				<div class="wd-page-title-bg wd-fill">
					<img width="1920" height="410" src="/wp-content/uploads/2026/04/edc-hero-section-bg.jpg"
						class="attachment-full size-full" alt="" decoding="async" fetchpriority="high" />
				</div>
				<div class="container">
					<h1 class="entry-title title">
						{{ __('Mentions légales') }} </h1>


					<nav class="wd-breadcrumbs"><a href="{{ url('/') }}">{{ __('Inicio') }}</a><span
							class="wd-delimiter">•</span><span class="wd-last">{{ __('Mentions légales') }}</span></nav>
				</div>
			</div>

			<main id="main-content" class="wd-content-layout content-layout-wrapper container" role="main">


				<div class="wd-content-area site-content">
					<article id="post-3134" class="entry-content post-3134 page type-page status-publish hentry">
						<div data-elementor-type="wp-page" data-elementor-id="3134" class="elementor elementor-3134">
							<div class="wd-negative-gap elementor-element elementor-element-5b3dcf2 e-flex e-con-boxed e-con e-parent"
								data-id="5b3dcf2" data-element_type="container" data-e-type="container">
								<div class="e-con-inner">
									<div class="elementor-element elementor-element-2f65f0b color-scheme-inherit text-left elementor-widget elementor-widget-text-editor"
										data-id="2f65f0b" data-element_type="widget" data-e-type="widget"
										data-widget_type="text-editor.default">
										@include('partials.company-legal-identity')

										@if (! empty(config('company.hosting_name')))
											<h2>{{ __('Hébergeur') }}</h2>
											<p><strong>{{ config('company.hosting_name') }}</strong></p>
											@if (! empty(config('company.hosting_address')))
												<p>{{ config('company.hosting_address') }}</p>
											@endif
											@if (! empty(config('company.hosting_website')))
												<p><a href="{{ config('company.hosting_website') }}" rel="noopener noreferrer" target="_blank">{{ config('company.hosting_website') }}</a></p>
											@endif
										@endif

										@if (! empty(config('company.mediator_name')) || ! empty(config('company.mediator_website')))
											<h2>{{ __('Médiation de la consommation') }}</h2>
											@if (! empty(config('company.mediator_name')))
												<p><strong>{{ config('company.mediator_name') }}</strong></p>
											@endif
											@if (! empty(config('company.mediator_website')))
												<p><a href="{{ config('company.mediator_website') }}" rel="noopener noreferrer" target="_blank">{{ config('company.mediator_website') }}</a></p>
											@endif
										@endif

										<h2>{{ __('2. Objet') }}</h2>
										<p>{{ __('Les présentes Mentions légales régissent l’accès, la navigation et l’utilisation du site web édité par') }}
											<strong>{{ config('company.legal_name') }}</strong>
											({{ config('company.trade_name') }}),
											{{ __('ainsi que les responsabilités liées à l’utilisation de ses contenus (textes, images, designs, logos, produits, services, bases de données et logiciels).') }}
										</p>
										<p>{{ __('L’accès au site implique l’acceptation pleine et entière des présentes conditions.') }}</p>

										<h2>{{ __('3. Conditions d’utilisation') }}</h2>
										<p>{{ __('L’utilisateur s’engage à utiliser le site de manière licite, diligente et conforme à la législation applicable, à la bonne foi, à l’ordre public et aux présentes Mentions légales.') }}</p>
										<p>{{ __('Il est notamment interdit de :') }}</p>
										<ul>
											<li><p>{{ __('Utiliser le site à des fins illicites ou frauduleuses.') }}</p></li>
											<li><p>{{ __('Introduire des virus, malwares ou tout élément susceptible d’endommager les systèmes de l’éditeur ou de tiers.') }}</p></li>
											<li><p>{{ __('Tenter d’accéder sans autorisation à des zones restreintes, systèmes ou réseaux liés au site.') }}</p></li>
											<li><p>{{ __('Reproduire, copier, distribuer ou exploiter commercialement les contenus sans autorisation préalable écrite.') }}</p></li>
										</ul>

										<h2>{{ __('4. Propriété intellectuelle') }}</h2>
										<p>{{ __('Tous les contenus du site sont protégés par le droit de la propriété intellectuelle. Toute reproduction non autorisée est interdite.') }}</p>

										<h2>{{ __('5. Responsabilité') }}</h2>
										<p>{{ __('L’éditeur s’efforce de maintenir des informations exactes et à jour. Toutefois, il ne garantit pas l’absence totale d’erreurs, d’interruptions ou d’indisponibilités temporaires.') }}</p>
										<p>{{ __('Les descriptions, photos et caractéristiques des produits sont fournies de bonne foi. En cas d’écart manifeste, le client en est informé avant confirmation définitive de la commande lorsque cela est possible.') }}</p>

										<h2>{{ __('6. Données personnelles') }}</h2>
										<p>{{ __('Le traitement des données personnelles est décrit dans la Politique de confidentialité, conformément au RGPD et à la législation française applicable.') }}</p>

										<h2>{{ __('7. Cookies') }}</h2>
										<p>{{ __('Le site peut utiliser des cookies. Les détails figurent dans la Politique de cookies.') }}</p>

										<h2>{{ __('8. Commerce électronique') }}</h2>
										<p>{{ __('Les ventes en ligne sont soumises au Code de la consommation français et aux Conditions générales de vente publiées sur le site. Les prix, modes de paiement, délais, livraisons et droit de rétractation y sont précisés.') }}</p>
										<p>{{ __('Aucun avantage commercial (livraison gratuite, délais fixes, garantie commerciale spécifique) n’est garanti s’il n’est pas explicitement confirmé sur la fiche produit, le devis ou le récapitulatif de commande.') }}</p>

										<h2>{{ __('9. Droit applicable') }}</h2>
										<p>{{ __('Les présentes Mentions légales sont régies par le droit français.') }}</p>
										<p>{{ __('En cas de litige, et à défaut d’accord amiable, les tribunaux compétents seront ceux déterminés par les règles applicables en matière de consommation.') }}</p>

										<h2>{{ __('10. Modifications') }}</h2>
										<p>{{ __('L’éditeur se réserve le droit de modifier les présentes Mentions légales pour les adapter à l’évolution légale, technique ou organisationnelle. La version applicable est celle publiée sur cette page.') }}</p>
									</div>
								</div>
							</div>
						</div>


					</article>



				</div>



				
			</main>

		</div>
@endsection
