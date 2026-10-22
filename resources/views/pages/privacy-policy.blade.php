@extends('layouts.app')

@section('title', 'Política de privacidad | '.config('app.name'))


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
						{{ __('Política de Privacidad') }} </h1>


					<nav class="wd-breadcrumbs"><a href="../">{{ __('Inicio') }}</a><span
							class="wd-delimiter">•</span><span class="wd-last">{{ __('Política de Privacidad') }}</span></nav>
				</div>
			</div>

			<main id="main-content" class="wd-content-layout content-layout-wrapper container" role="main">


				<div class="wd-content-area site-content">
					<article id="post-3431" class="entry-content post-3431 page type-page status-publish hentry">
						<div data-elementor-type="wp-page" data-elementor-id="3431" class="elementor elementor-3431">
							<div class="wd-negative-gap elementor-element elementor-element-2e070f5 e-flex e-con-boxed e-con e-parent"
								data-id="2e070f5" data-element_type="container" data-e-type="container">
								<div class="e-con-inner">
									<div class="elementor-element elementor-element-3b326c8 color-scheme-inherit text-left elementor-widget elementor-widget-text-editor"
										data-id="3b326c8" data-element_type="widget" data-e-type="widget"
										data-widget_type="text-editor.default">
										<h2>{{ __('1. Responsable del tratamiento') }}</h2>
										<p>{{ __('De conformidad con el Reglamento (UE) 2016/679 (RGPD), la Ley Orgánica 3/2018 (LOPDGDD) y demás normativa aplicable, se informa a los usuarios de que los datos personales facilitados a través del sitio web serán tratados por:') }}</p>
										<p><strong>{{ __('Responsable:') }}</strong> {{ config('company.legal_name') }}</p>
										<p><strong>{{ __('SIRET:') }}</strong> {{ config('company.siret') }}</p>
										<p><strong>{{ __('Domicilio social:') }}</strong> {{ config('company.address_line1') }}@if(!empty(config('company.address_line2'))), {{ config('company.address_line2') }}@endif, {{ config('company.postal_code') }} {{ config('company.city') }}, {{ config('company.region') }}, {{ config('company.country') }}.
										</p>
										<p><strong>{{ __('Correo electrónico de contacto:') }}</strong> <a
												href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a>
										</p>
										<p><strong>{{ __('Sitio web:') }}</strong> <a
												href="{{ rtrim((string) config('company.website'), '/') }}">{{ rtrim((string) config('company.website'), '/') }}</a></p>
										<h2>{{ __('2. Finalidad del tratamiento') }}</h2>
										<p>{{ __('Los datos personales serán tratados para las siguientes finalidades:') }}</p>
										<ul>
											<li>
												<p>{{ __('Gestionar los pedidos realizados a través del sitio web.') }}</p>
											</li>
											<li>
												<p>{{ __('Tramitar pagos, envíos, devoluciones y garantías.') }}</p>
											</li>
											<li>
												<p>{{ __('Atender consultas, solicitudes de información y comunicaciones de los usuarios.') }}</p>
											</li>
											<li>
												<p>{{ __('Gestionar la relación comercial con clientes y proveedores.') }}</p>
											</li>
											<li>
												<p>{{ __('Cumplir las obligaciones legales, fiscales y contables.') }}</p>
											</li>
											<li>
												<p>{{ __('Enviar comunicaciones comerciales, promociones o newsletters cuando el usuario haya prestado su consentimiento.') }}</p>
											</li>
											<li>
												<p>{{ __('Mejorar la experiencia de navegación, la calidad del servicio y la seguridad del sitio web.') }}</p>
											</li>
										</ul>
										<h2>{{ __('3. Base jurídica del tratamiento') }}</h2>
										<p>{{ __('El tratamiento de los datos personales se basa en una o varias de las siguientes bases jurídicas:') }}</p>
										<ul>
											<li>
												<p>{{ __('La ejecución de un contrato de compraventa o de prestación de servicios.') }}</p>
											</li>
											<li>
												<p>{{ __('El consentimiento otorgado por el usuario.') }}</p>
											</li>
											<li>
												<p>{{ __('El cumplimiento de obligaciones legales.') }}</p>
											</li>
											<li>
												<p>{{ __('El interés legítimo del Responsable para mejorar sus servicios, prevenir el fraude y garantizar la seguridad del sitio web.') }}</p>
											</li>
										</ul>
										<h2>{{ __('4. Datos tratados') }}</h2>
										<p>{{ __('Podrán tratarse las siguientes categorías de datos:') }}</p>
										<ul>
											<li>
												<p>{{ __('Nombre y apellidos.') }}</p>
											</li>
											<li>
												<p>{{ __('Dirección postal.') }}</p>
											</li>
											<li>
												<p>{{ __('Dirección de correo electrónico.') }}</p>
											</li>
											<li>
												<p>{{ __('Número de teléfono.') }}</p>
											</li>
											<li>
												<p>{{ __('Datos de facturación.') }}</p>
											</li>
											<li>
												<p>{{ __('Información sobre pedidos y compras.') }}</p>
											</li>
											<li>
												<p>{{ __('Dirección IP y datos de navegación.') }}</p>
											</li>
											<li>
												<p>{{ __('Información obtenida mediante cookies, cuando corresponda.') }}</p>
											</li>
										</ul>
										<p>{{ __('No se solicitan deliberadamente categorías especiales de datos personales.') }}
										</p>
										<h2>{{ __('5. Conservación de los datos') }}</h2>
										<p>{{ __('Los datos personales se conservarán durante el tiempo necesario para cumplir con la finalidad para la que fueron recogidos.') }}</p>
										<p>{{ __('Posteriormente, se conservarán bloqueados durante los plazos exigidos por la legislación fiscal, mercantil y administrativa, y serán eliminados de forma segura una vez transcurridos dichos plazos.') }}</p>
										<p>{{ __('Los datos utilizados para comunicaciones comerciales se conservarán mientras el usuario no retire su consentimiento.') }}</p>
										<h2>{{ __('6. Destinatarios de los datos') }}</h2>
										<p>{{ __('Los datos podrán ser comunicados únicamente cuando sea necesario a:') }}</p>
										<ul>
											<li>
												<p>{{ __('Empresas de transporte y logística para la entrega de pedidos.') }}</p>
											</li>
											<li>
												<p>{{ __('Entidades financieras y proveedores de servicios de pago.') }}</p>
											</li>
											<li>
												<p>{{ __('Asesorías fiscales, contables y jurídicas.') }}</p>
											</li>
											<li>
												<p>{{ __('Proveedores tecnológicos que presten servicios de alojamiento, mantenimiento o soporte del sitio web.') }}</p>
											</li>
											<li>
												<p>{{ __('Administraciones públicas y autoridades competentes cuando exista obligación legal.') }}</p>
											</li>
										</ul>
										<p>{{ __('Todos los proveedores que traten datos personales por cuenta del Responsable actúan conforme a contratos de tratamiento de datos y aplican las medidas de seguridad exigidas por la normativa vigente.') }}</p>
										<h2>{{ __('7. Transferencias internacionales') }}</h2>
										<p>{{ __('Con carácter general, no se realizan transferencias internacionales de datos personales.') }}</p>
										<p>{{ __('En caso de utilizar proveedores ubicados fuera del Espacio Económico Europeo, dichas transferencias se realizarán únicamente cuando existan garantías adecuadas conforme a los artículos 44 y siguientes del Reglamento (UE) 2016/679.') }}</p>
										<h2>{{ __('8. Derechos de los usuarios') }}</h2>
										<p>{{ __('Los usuarios pueden ejercer en cualquier momento los siguientes derechos:') }}</p>
										<ul>
											<li>
												<p>{{ __('Derecho de acceso.') }}</p>
											</li>
											<li>
												<p>{{ __('Derecho de rectificación.') }}</p>
											</li>
											<li>
												<p>{{ __('Derecho de supresión.') }}</p>
											</li>
											<li>
												<p>{{ __('Derecho de oposición.') }}</p>
											</li>
											<li>
												<p>{{ __('Derecho a la limitación del tratamiento.') }}</p>
											</li>
											<li>
												<p>{{ __('Derecho a la portabilidad de los datos.') }}</p>
											</li>
											<li>
												<p>{{ __('Derecho a retirar el consentimiento en cualquier momento.') }}</p>
											</li>
											<li>
												<p>{{ __('Derecho a no ser objeto de decisiones automatizadas cuando proceda.') }}
												</p>
											</li>
										</ul>
										<p>{{ __('Para ejercer estos derechos deberá enviarse una solicitud, indicando claramente el derecho que desea ejercer, a:') }}</p>
										<p><strong>{{ __('Correo electrónico:') }}</strong> <a
												href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a>
										</p>
										<p>{{ __('El Responsable podrá solicitar información adicional para verificar la identidad del solicitante cuando resulte necesario.') }}</p>
										<p>{{ __('Si el usuario considera que sus derechos no han sido respetados, podrá presentar una reclamación ante la') }} <strong>{{ __('Agencia Española de Protección de Datos (AEPD)') }}</strong>.</p>
										<h2>{{ __('9. Seguridad de la información') }}</h2>
										<p>{{ config('company.legal_name') }} {{ __('aplica medidas técnicas y organizativas apropiadas para proteger los datos personales frente a pérdida, destrucción, alteración, acceso no autorizado o cualquier otro tratamiento ilícito, teniendo en cuenta el estado de la técnica, la naturaleza de los datos y los riesgos existentes.') }}</p>
										<p>{{ __('No obstante, ningún sistema de transmisión o almacenamiento de información puede garantizar una seguridad absoluta.') }}</p>
										<h2>{{ __('10. Cookies') }}</h2>
										<p>{{ __('Este sitio web utiliza cookies técnicas, analíticas y, en su caso, publicitarias.') }}</p>
										<p>{{ __('La información detallada sobre su utilización, configuración y gestión del consentimiento se encuentra disponible en la Política de Cookies.') }}</p>
										<h2>{{ __('11. Menores de edad') }}</h2>
										<p>{{ __('Este sitio web no está dirigido a menores de 18 años.') }}</p>
										<p>{{ __('El Responsable no recopila deliberadamente datos personales de menores. Si se detectara que un menor ha facilitado información personal sin autorización, dichos datos serán eliminados lo antes posible.') }}</p>
										<h2>{{ __('12. Modificaciones de la Política de Privacidad') }}</h2>
										<p>{{ __('El Responsable podrá actualizar la presente Política de Privacidad para adaptarla a cambios legislativos, tecnológicos o en la actividad del sitio web.') }}</p>
										<p>{{ __('Las modificaciones serán publicadas en esta misma página y producirán efectos desde su publicación.') }}</p>
										<h2>{{ __('13. Contacto') }}</h2>
										<p>{{ __('Para cualquier consulta relacionada con la protección de datos personales puede contactar con:') }}</p>
										<p><strong>{{ config('company.legal_name') }}</strong></p>
										<p>{{ config('company.address_line1') }}@if(!empty(config('company.address_line2'))), {{ config('company.address_line2') }}@endif</p>
										<p>{{ config('company.postal_code') }} {{ config('company.city') }}@if(!empty(config('company.region'))), {{ config('company.region') }}@endif, {{ config('company.country') }}</p>
										<p>{{ __('Correo electrónico:') }} <a
												href="mailto:{{ config('company.email') }}">{{ config('company.email') }}</a>
										</p>
										<p>{{ __('Sitio web:') }} <a href="{{ rtrim((string) config('company.website'), '/') }}">{{ rtrim((string) config('company.website'), '/') }}</a></p>
									</div>
								</div>
							</div>
						</div>


					</article>



				</div>



				
			</main>

		</div>
@endsection