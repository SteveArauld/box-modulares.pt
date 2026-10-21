@extends('layouts.app')

@section('title', 'Política de cookies | '.config('app.name'))


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
						{{ __('Política de Cookies') }} </h1>


					<nav class="wd-breadcrumbs"><a href="../">{{ __('Inicio') }}</a><span
							class="wd-delimiter">•</span><span class="wd-last">{{ __('Política de Cookies') }}</span></nav>
				</div>
			</div>

			<main id="main-content" class="wd-content-layout content-layout-wrapper container" role="main">


				<div class="wd-content-area site-content">
					<article id="post-3788" class="entry-content post-3788 page type-page status-publish hentry">
						<div data-elementor-type="wp-page" data-elementor-id="3788" class="elementor elementor-3788">
							<div class="wd-negative-gap elementor-element elementor-element-e573b47 e-flex e-con-boxed e-con e-parent"
								data-id="e573b47" data-element_type="container" data-e-type="container">
								<div class="e-con-inner">
									<div class="elementor-element elementor-element-42c0de7 color-scheme-inherit text-left elementor-widget elementor-widget-text-editor"
										data-id="42c0de7" data-element_type="widget" data-e-type="widget"
										data-widget_type="text-editor.default">
										<h2>{{ __('1. ¿Qué son las cookies?') }}</h2>
										<p>{{ __('Las cookies son pequeños archivos de texto que se almacenan en el dispositivo del usuario (ordenador, teléfono móvil, tableta u otro dispositivo) cuando visita un sitio web.') }}</p>
										<p>{{ __('Su finalidad es permitir el correcto funcionamiento del sitio, recordar determinadas preferencias, mejorar la experiencia de navegación, analizar el uso del sitio web y, en algunos casos, mostrar publicidad personalizada.') }}</p>
										<h2>{{ __('2. Responsable') }}</h2>
										<p><strong>{{ __('Responsable del sitio web:') }}</strong></p>
										<p><strong>{{ __('Arquisset de Construccio S.L.') }}</strong></p>
										<p><strong>{{ __('CIF:') }}</strong> {{ __('B63714778') }}</p>
										<p><strong>{{ __('Domicilio social:') }}</strong> {{ __('Calle Avenir 8, 08006 Barcelona, España.') }}
										</p>
										<p><strong>{{ __('Correo electrónico:') }}</strong> <a
												href="mailto:contacto@gsccontainers.com">contacto@gsccontainers.com</a>
										</p>
										<p><strong>{{ __('Sitio web:') }}</strong> <a
												href="../">{{ __('https://domaine.pt') }}</a></p>
										<h2>{{ __('3. Tipos de cookies utilizadas') }}</h2>
										<p>{{ __('Este sitio web puede utilizar las siguientes categorías de cookies:') }}</p>
										<h3>{{ __('Cookies técnicas') }}</h3>
										<p>{{ __('Son necesarias para el funcionamiento del sitio web y permiten funciones esenciales como:') }}</p>
										<ul>
											<li>
												<p>{{ __('Navegación entre páginas.') }}</p>
											</li>
											<li>
												<p>{{ __('Acceso al área de cliente.') }}</p>
											</li>
											<li>
												<p>{{ __('Gestión del carrito de compra.') }}</p>
											</li>
											<li>
												<p>{{ __('Proceso de compra.') }}</p>
											</li>
											<li>
												<p>{{ __('Seguridad del sitio web.') }}</p>
											</li>
										</ul>
										<p>{{ __('Estas cookies no requieren el consentimiento del usuario.') }}</p>
										<h3>{{ __('Cookies de preferencias') }}</h3>
										<p>{{ __('Permiten recordar determinadas configuraciones elegidas por el usuario, como:') }}
										</p>
										<ul>
											<li>
												<p>{{ __('Idioma.') }}</p>
											</li>
											<li>
												<p>{{ __('Moneda.') }}</p>
											</li>
											<li>
												<p>{{ __('Preferencias de navegación.') }}</p>
											</li>
										</ul>
										<h3>{{ __('Cookies analíticas') }}</h3>
										<p>{{ __('Permiten conocer cómo interactúan los visitantes con el sitio web mediante la recopilación de información estadística anónima.') }}</p>
										<p>{{ __('Estas cookies ayudan a mejorar continuamente el funcionamiento del sitio.') }}</p>
										<p>{{ __('Ejemplos:') }}</p>
										<ul>
											<li>
												<p>{{ __('Número de visitas.') }}</p>
											</li>
											<li>
												<p>{{ __('Páginas más consultadas.') }}</p>
											</li>
											<li>
												<p>{{ __('Tiempo de navegación.') }}</p>
											</li>
											<li>
												<p>{{ __('Dispositivo utilizado.') }}</p>
											</li>
										</ul>
										<p>{{ __('Estas cookies solo se instalarán si el usuario presta su consentimiento.') }}</p>
										<h3>{{ __('Cookies de publicidad') }}</h3>
										<p>{{ __('Permiten mostrar anuncios relacionados con los intereses del usuario.') }}</p>
										<p>{{ __('Pueden utilizarse para limitar el número de veces que se muestra un anuncio y medir la eficacia de las campañas publicitarias.') }}</p>
										<p>{{ __('Solo se instalarán previo consentimiento del usuario.') }}</p>
										<h3>{{ __('Cookies de terceros') }}</h3>
										<p>{{ __('Este sitio web puede utilizar servicios proporcionados por terceros que instalan sus propias cookies para ofrecer funcionalidades o realizar análisis estadísticos.') }}</p>
										<p>{{ __('Entre estos servicios pueden encontrarse:') }}</p>
										<ul>
											<li>
												<p>{{ __('Google Analytics.') }}</p>
											</li>
											<li>
												<p>{{ __('Google Ads.') }}</p>
											</li>
											<li>
												<p>{{ __('Google Tag Manager.') }}</p>
											</li>
											<li>
												<p>{{ __('Meta (Facebook).') }}</p>
											</li>
											<li>
												<p>{{ __('YouTube.') }}</p>
											</li>
											<li>
												<p>{{ __('Stripe o plataformas de pago.') }}</p>
											</li>
											<li>
												<p>{{ __('Empresas de chat en línea.') }}</p>
											</li>
										</ul>
										<p>{{ __('Cada proveedor dispone de su propia política de privacidad y de cookies.') }}</p>
										<h2>{{ __('4. Base jurídica') }}</h2>
										<p>{{ __('La utilización de cookies técnicas se basa en el interés legítimo y en la necesidad de prestar el servicio solicitado.') }}</p>
										<p>{{ __('Las cookies analíticas, publicitarias y de personalización únicamente se instalarán cuando el usuario haya otorgado su consentimiento mediante el banner de cookies.') }}</p>
										<p>{{ __('El usuario podrá retirar dicho consentimiento en cualquier momento.') }}</p>
										<h2>{{ __('5. Gestión del consentimiento') }}</h2>
										<p>{{ __('Al acceder por primera vez al sitio web, el usuario visualizará un panel de configuración de cookies que le permitirá:') }}</p>
										<ul>
											<li>
												<p>{{ __('Aceptar todas las cookies.') }}</p>
											</li>
											<li>
												<p>{{ __('Rechazar todas las cookies no esenciales.') }}</p>
											</li>
											<li>
												<p>{{ __('Configurar sus preferencias por categorías.') }}</p>
											</li>
										</ul>
										<p>{{ __('La elección realizada podrá modificarse en cualquier momento mediante el enlace «Configuración de Cookies» disponible en el sitio web.') }}</p>
										<h2>{{ __('6. Cómo desactivar las cookies desde el navegador') }}</h2>
										<p>{{ __('El usuario puede eliminar o bloquear las cookies desde la configuración de su navegador.') }}</p>
										<p>{{ __('Los principales navegadores ofrecen esta posibilidad en sus opciones de privacidad y seguridad.') }}</p>
										<p>{{ __('La desactivación de determinadas cookies puede afectar al correcto funcionamiento del sitio web o impedir el uso de algunas funcionalidades.') }}
										</p>
										<h2>{{ __('7. Conservación de las cookies') }}</h2>
										<p>{{ __('Las cookies permanecerán almacenadas únicamente durante el tiempo necesario para cumplir su finalidad.') }}</p>
										<p>{{ __('Las cookies de sesión se eliminan automáticamente al cerrar el navegador.') }}</p>
										<p>{{ __('Las cookies persistentes permanecerán activas durante el período definido por cada proveedor o hasta que el usuario las elimine manualmente.') }}</p>
										<h2>{{ __('8. Transferencias internacionales') }}</h2>
										<p>{{ __('Algunos proveedores de servicios pueden tratar datos fuera del Espacio Económico Europeo.') }}</p>
										<p>{{ __('Cuando esto ocurra, dichas transferencias se realizarán únicamente con las garantías exigidas por el Reglamento (UE) 2016/679.') }}</p>
										<h2>{{ __('9. Derechos de los usuarios') }}</h2>
										<p>{{ __('El usuario podrá ejercer los derechos reconocidos por la normativa de protección de datos:') }}</p>
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
												<p>{{ __('Derecho a la portabilidad.') }}</p>
											</li>
											<li>
												<p>{{ __('Derecho a retirar el consentimiento.') }}</p>
											</li>
										</ul>
										<p>{{ __('Las solicitudes podrán dirigirse a:') }}</p>
										<p><strong>{{ __('Correo electrónico:') }}</strong> <a
												href="mailto:contacto@gsccontainers.com">contacto@gsccontainers.com</a>
										</p>
										<p>{{ __('Asimismo, si considera que sus derechos no han sido respetados, podrá presentar una reclamación ante la Agencia Española de Protección de Datos (AEPD).') }}</p>
										<h2>{{ __('10. Modificaciones de la Política de Cookies') }}</h2>
										<p>{{ __('Arquisset de Construccio S.L. podrá actualizar esta Política de Cookies para adaptarla a cambios legislativos, tecnológicos o a la incorporación de nuevos servicios.') }}</p>
										<p>{{ __('Las modificaciones serán publicadas en esta misma página y entrarán en vigor desde su publicación.') }}</p>
									</div>
								</div>
							</div>
						</div>


					</article>



				</div>



				
			</main>

		</div>
@endsection