@extends('layouts.app')

@section('title', 'Política de envíos | '.config('app.name'))


@section('content')
<div class="wd-page-content main-page-wrapper">

			<link rel="stylesheet" id="wd-page-title-css"
				href="{{ asset('/wp-content/themes/woodmart/css/parts/page-title8833.css') }} type="text/css"
				media="all" />
			<div class="wd-page-title page-title  page-title-default title-size-small title-design-default color-scheme-light"
				style="">
				<div class="wd-page-title-bg wd-fill">
					<img width="1920" height="410" src="/wp-content/uploads/2026/04/edc-hero-section-bg.jpg"
						class="attachment-full size-full" alt="" decoding="async" fetchpriority="high" />
				</div>
				<div class="container">
					<h1 class="entry-title title">
						{{ __('Política de Envíos') }} </h1>


					<nav class="wd-breadcrumbs"><a href="../">{{ __('Inicio') }}</a><span
							class="wd-delimiter">•</span><span class="wd-last">{{ __('Política de Envíos') }}</span></nav>
				</div>
			</div>

			<main id="main-content" class="wd-content-layout content-layout-wrapper container" role="main">


				<div class="wd-content-area site-content">
					<article id="post-4371" class="entry-content post-4371 page type-page status-publish hentry">
						<div data-elementor-type="wp-page" data-elementor-id="4371" class="elementor elementor-4371">
							<div class="wd-negative-gap elementor-element elementor-element-4f15bf8 e-flex e-con-boxed e-con e-parent"
								data-id="4f15bf8" data-element_type="container" data-e-type="container">
								<div class="e-con-inner">
									<div class="elementor-element elementor-element-6722c8a color-scheme-inherit text-left elementor-widget elementor-widget-text-editor"
										data-id="6722c8a" data-element_type="widget" data-e-type="widget"
										data-widget_type="text-editor.default">
										@php
											$shippingFee = number_format((float) config('company.shipping.fee', 350), 2, ',', ' ');
											$prepMin = (int) config('company.shipping.preparation_days_min', 2);
											$prepMax = (int) config('company.shipping.preparation_days_max', 3);
											$delMin = (int) config('company.shipping.delivery_days_min', 3);
											$delMax = (int) config('company.shipping.delivery_days_max', 6);
											$zones = config('company.shipping.zones', ['PT', 'ES']);
											$zoneLabels = [
												'FR' => __('France'),
												'PT' => __('Portugal'),
												'ES' => __('Espagne'),
											];
											$zoneList = collect($zones)->map(fn ($code) => $zoneLabels[$code] ?? $code)->implode(', ');
										@endphp
										<h2>{{ __('1. Ámbito de aplicación') }}</h2>
										<p>{{ __('La presente Política de Envíos regula las condiciones de preparación, expedición y entrega de los productos adquiridos a través del sitio web') }}
											<strong><a href="{{ rtrim((string) config('company.website'), '/') }}">{{ rtrim((string) config('company.website'), '/') }}</a></strong>.</p>
										<h2>{{ __('2. Zonas de envío') }}</h2>
										<p>{{ config('company.legal_name') }} {{ __('realiza envíos a Portugal y a España.') }}</p>
										<p>{{ __('Zonas cubiertas:') }} <strong>{{ $zoneList }}</strong>.</p>
										<p>{{ __('Si desea realizar un envío a un destino no disponible en la tienda online, puede ponerse en contacto con nuestro servicio de atención al cliente en:') }}
										</p>
										<p><strong>{{ __('Correo electrónico:') }}</strong> <a
												href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a>
										</p>
										<h2>{{ __('3. Gastos de envío') }}</h2>
										<p><strong>{{ __('Los gastos de envío para Portugal y España son de') }} {{ $shippingFee }} €</strong> {{ __('por pedido.') }}</p>
										<p>{{ __('Este importe se aplica de forma fija a los envíos con destino a Portugal o España y se muestra en el carrito y en el proceso de compra antes de la confirmación del pedido.') }}</p>
										<p>{{ __('No se aplican gastos de envío adicionales durante el proceso de compra, salvo que se indique expresamente para servicios especiales solicitados por el cliente, como entregas urgentes, montajes o servicios personalizados.') }}</p>
										<h2>{{ __('4. Preparación del pedido') }}</h2>
										<p>{{ __('Los pedidos se preparan una vez confirmado el pago.') }}</p>
										<p>{{ __('El tiempo de preparación es de') }} <strong>{{ $prepMin }} {{ __('a') }} {{ $prepMax }} {{ __('días laborables') }}</strong>.</p>
										<p>{{ __('Nuestro equipo trabaja para preparar y expedir los pedidos en el menor tiempo posible, respetando los controles de calidad y seguridad.') }}</p>
										<h2>{{ __('5. Plazos de entrega') }}</h2>
										<p>{{ __('Una vez expedido el pedido, el plazo de entrega estimado es de') }} <strong>{{ $delMin }} {{ __('a') }} {{ $delMax }} {{ __('días laborables') }}</strong> {{ __('para destinos en Portugal y España.') }}</p>
										<p>{{ __('El plazo total orientativo (preparación + transporte) puede oscilar entre') }} <strong>{{ $prepMin + $delMin }} {{ __('y') }} {{ $prepMax + $delMax }} {{ __('días laborables') }}</strong>, {{ __('según la disponibilidad del producto y la dirección de destino.') }}</p>
										<p>{{ __('En circunstancias excepcionales, como campañas promocionales, periodos de alta demanda, condiciones meteorológicas adversas o causas de fuerza mayor, los plazos podrán verse ampliados.') }}</p>
										<p>{{ __('Si se produjera un retraso significativo, el cliente será informado a la mayor brevedad posible.') }}</p>
										<h2>{{ __('6. Seguimiento del envío') }}</h2>
										<p>{{ __('Cuando el transportista lo permita, el cliente recibirá la información necesaria para realizar el seguimiento de su pedido.') }}</p>
										<h2>{{ __('7. Recepción del pedido') }}</h2>
										<p>{{ __('Se recomienda comprobar el estado del paquete en el momento de la entrega.') }}
										</p>
										<p>{{ __('Si el embalaje presenta daños visibles o el pedido llega incompleto, el cliente deberá indicarlo en el justificante del transportista y comunicar la incidencia a') }} <strong><a
													href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a></strong>
											{{ __('en un plazo máximo de 48 horas desde la recepción.') }}</p>
										<h2>{{ __('8. Imposibilidad de entrega') }}</h2>
										<p>{{ __('Si la entrega no pudiera efectuarse por causas imputables al cliente (dirección incorrecta, ausencia reiterada u otros motivos similares), el transportista podrá realizar nuevos intentos o depositar el envío según sus procedimientos.') }}</p>
										<p>{{ __('En caso de devolución del pedido al remitente,') }} {{ config('company.legal_name') }} {{ __('se pondrá en contacto con el cliente para acordar una nueva entrega. Los costes adicionales derivados de un nuevo intento de entrega podrán repercutirse al cliente.') }}</p>
										<h2>{{ __('9. Productos dañados o incidencias') }}</h2>
										<p>{{ __('Si el cliente recibe un producto dañado, defectuoso o diferente al solicitado, deberá comunicarlo lo antes posible enviando un correo electrónico a') }} <strong><a
													href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a></strong>{{ __(', indicando el número de pedido y adjuntando fotografías de la incidencia.') }}</p>
										<p>{{ __('Una vez verificada la reclamación, se ofrecerá la solución que corresponda conforme a la legislación vigente.') }}</p>
										<h2>{{ __('10. Contacto') }}</h2>
										<p>{{ __('Para cualquier consulta relacionada con los envíos, puede contactar con nuestro servicio de atención al cliente:') }}</p>
										<p><strong>{{ config('company.legal_name') }}</strong></p>
										<p>{{ config('company.address_line1') }}@if(!empty(config('company.address_line2'))), {{ config('company.address_line2') }}@endif</p>
										<p>{{ config('company.postal_code') }} {{ config('company.city') }}, {{ config('company.region') }}, {{ config('company.country') }}</p>
										<p><strong>{{ __('Correo electrónico:') }}</strong> <a
												href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a>
										</p>
										<p><strong>{{ __('Sitio web:') }}</strong> <a
												href="{{ rtrim((string) config('company.website'), '/') }}">{{ rtrim((string) config('company.website'), '/') }}</a></p>
									</div>
								</div>
							</div>
						</div>


					</article>



				</div>



				
			</main>

		</div>
@endsection