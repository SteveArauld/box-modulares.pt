@extends('layouts.app')

@section('title', 'Política de pago | '.config('app.name'))


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
						{{ __('Política de Pago') }} </h1>


					<nav class="wd-breadcrumbs"><a href="../">{{ __('Inicio') }}</a><span
							class="wd-delimiter">•</span><span class="wd-last">{{ __('Política de Pago') }}</span></nav>
				</div>
			</div>

			<main id="main-content" class="wd-content-layout content-layout-wrapper container" role="main">


				<div class="wd-content-area site-content">
					<article id="post-5145" class="entry-content post-5145 page type-page status-publish hentry">
						<div data-elementor-type="wp-page" data-elementor-id="5145" class="elementor elementor-5145">
							<div class="wd-negative-gap elementor-element elementor-element-6b7a0f8 e-flex e-con-boxed e-con e-parent"
								data-id="6b7a0f8" data-element_type="container" data-e-type="container">
								<div class="e-con-inner">
									<div class="elementor-element elementor-element-3c52429 color-scheme-inherit text-left elementor-widget elementor-widget-text-editor"
										data-id="3c52429" data-element_type="widget" data-e-type="widget"
										data-widget_type="text-editor.default">
										<h2>{{ __('1. Objeto') }}</h2>
										<p>{{ __('La presente Política de Pago regula las condiciones aplicables a los pagos realizados en el sitio web') }} <strong><a
													href="../">{{ __('https://domaine.pt') }}</a></strong>{{ __(', titularidad de') }} <strong>{{ __('Arquisset de Construccio S.L.') }}</strong></p>
										<p>{{ __('Al realizar un pedido, el cliente acepta las condiciones establecidas en esta Política de Pago.') }}</p>
										<h2>{{ __('2. Moneda') }}</h2>
										<p>{{ __('Todos los precios publicados en el Sitio Web se expresan en') }} <strong>{{ __('euros (€)') }}</strong>.</p>
										<p>{{ __('Salvo indicación expresa en contrario, los precios incluyen el Impuesto sobre el Valor Añadido (IVA) aplicable conforme a la legislación española.') }}</p>
										<h2>{{ __('3. Formas de pago aceptadas') }}</h2>
										<p>{{ __('Para facilitar las compras, el Sitio Web podrá ofrecer uno o varios de los siguientes métodos de pago:') }}</p>
										<ul>
											<li>
												<p>{{ __('Tarjetas de crédito y débito (Visa, Mastercard u otras compatibles).') }}
												</p>
											</li>
											<li>
												<p>{{ __('PayPal.') }}</p>
											</li>
											<li>
												<p>{{ __('Stripe.') }}</p>
											</li>
											<li>
												<p>{{ __('Transferencia bancaria.') }}</p>
											</li>
											<li>
												<p>{{ __('Apple Pay (cuando esté disponible).') }}</p>
											</li>
											<li>
												<p>{{ __('Google Pay (cuando esté disponible).') }}</p>
											</li>
											<li>
												<p>{{ __('Otros métodos de pago que puedan incorporarse en el futuro.') }}</p>
											</li>
										</ul>
										<p>{{ __('Únicamente aparecerán durante el proceso de compra los métodos de pago disponibles para el cliente.') }}</p>
										<h2>{{ __('4. Seguridad de los pagos') }}</h2>
										<p>{{ __('Todos los pagos se procesan mediante plataformas de pago seguras que utilizan protocolos de cifrado SSL/TLS y cumplen con los estándares internacionales de seguridad para la protección de la información financiera.') }}</p>
										<p>{{ __('Arquisset de Construccio S.L. no almacena ni tiene acceso a los datos completos de las tarjetas bancarias utilizadas por los clientes.') }}</p>
										<h2>{{ __('5. Confirmación del pago') }}</h2>
										<p>{{ __('El pedido se considerará confirmado una vez que el pago haya sido autorizado y validado correctamente.') }}</p>
										<p>{{ __('El cliente recibirá un correo electrónico con la confirmación de su pedido.') }}
										</p>
										<p>{{ __('Arquisset de Construccio S.L. podrá suspender el procesamiento del pedido hasta la correcta verificación del pago.') }}</p>
										<h2>{{ __('6. Verificación y prevención del fraude') }}</h2>
										<p>{{ __('Con el fin de garantizar la seguridad de las transacciones, Arquisset de Construccio S.L. podrá realizar verificaciones adicionales cuando existan indicios de fraude o uso indebido de los medios de pago.') }}</p>
										<p>{{ __('En estos casos, podrá solicitar documentación adicional o cancelar el pedido si no es posible verificar la legitimidad de la operación.') }}</p>
										<h2>{{ __('7. Pago rechazado') }}</h2>
										<p>{{ __('Si una entidad financiera rechaza el pago, el pedido no será aceptado y el cliente será informado para que pueda utilizar otro método de pago.') }}</p>
										<p>{{ __('Arquisset de Construccio S.L. no será responsable de los costes o comisiones que pueda aplicar la entidad emisora del medio de pago.') }}</p>
										<h2>{{ __('8. Facturación') }}</h2>
										<p>{{ __('Una vez confirmado el pedido, el cliente recibirá la correspondiente factura conforme a la legislación fiscal española.') }}</p>
										<p>{{ __('La factura podrá emitirse en formato electrónico, salvo que el cliente solicite expresamente otro formato cuando la normativa lo permita.') }}</p>
										<p>{{ __('Es responsabilidad del cliente facilitar datos de facturación correctos y completos.') }}</p>
										<h2>{{ __('9. Reembolsos') }}</h2>
										<p>{{ __('Cuando proceda un reembolso conforme a la Política de Devoluciones y Reembolsos o a la legislación aplicable, este se realizará utilizando, siempre que sea posible, el mismo método de pago empleado en la compra.') }}</p>
										<p>{{ __('El reembolso se efectuará dentro de los plazos legalmente establecidos y una vez verificadas las condiciones de la devolución.') }}</p>
										<h2>{{ __('10. Impuestos') }}</h2>
										<p>{{ __('Los impuestos aplicables se calcularán de acuerdo con la normativa vigente y aparecerán desglosados durante el proceso de compra cuando sea necesario.') }}
										</p>
										<p>{{ __('En los pedidos con destino fuera del territorio donde se aplique el IVA español, el cliente podrá estar sujeto al pago de impuestos, derechos de aduana o tasas locales, que serán de su exclusiva responsabilidad.') }}</p>
										<h2>{{ __('11. Reserva de propiedad') }}</h2>
										<p>{{ __('La propiedad de los productos permanecerá en poder de Arquisset de Construccio S.L. hasta que se haya recibido el pago completo del importe correspondiente.') }}</p>
										<h2>{{ __('12. Modificaciones') }}</h2>
										<p>{{ __('Arquisset de Construccio S.L. podrá modificar la presente Política de Pago para adaptarla a cambios legislativos, tecnológicos o comerciales.') }}</p>
										<p>{{ __('Las modificaciones serán publicadas en esta página y serán aplicables desde su fecha de publicación.') }}</p>
										<h2>{{ __('13. Contacto') }}</h2>
										<p>{{ __('Para cualquier consulta relacionada con los pagos, puede ponerse en contacto con nosotros:') }}</p>
										<p><strong>{{ __('Arquisset de Construccio S.L.') }}</strong></p>
										<p>{{ __('Calle Avenir 8') }}</p>
										<p>{{ __('08006 Barcelona, España') }}</p>
										<p><strong>{{ __('Correo electrónico:') }}</strong> <a
												href="mailto:contacto@novaterra.pt">contacto@novaterra.pt</a>
										</p>
										<p><strong>{{ __('Sitio web:') }}</strong> <a
												href="../">{{ __('https://domaine.pt') }}</a></p>
									</div>
								</div>
							</div>
						</div>


					</article>



				</div>



				
			</main>

		</div>
@endsection