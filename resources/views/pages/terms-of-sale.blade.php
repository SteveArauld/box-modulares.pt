@extends('layouts.app')

@section('title', 'Condiciones generales de venta | '.config('app.name'))


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
						{{ __('Condiciones Generales de Venta') }} </h1>


					<nav class="wd-breadcrumbs"><a href="../">{{ __('Inicio') }}</a><span
							class="wd-delimiter">•</span><span class="wd-last">{{ __('Condiciones Generales de Venta') }}</span>
					</nav>
				</div>
			</div>

			<main id="main-content" class="wd-content-layout content-layout-wrapper container" role="main">


				<div class="wd-content-area site-content">
					<article id="post-3958" class="entry-content post-3958 page type-page status-publish hentry">
						<div data-elementor-type="wp-page" data-elementor-id="3958" class="elementor elementor-3958">
							<div class="wd-negative-gap elementor-element elementor-element-9fb2fe8 e-flex e-con-boxed e-con e-parent"
								data-id="9fb2fe8" data-element_type="container" data-e-type="container">
								<div class="e-con-inner">
									<div class="elementor-element elementor-element-c753bd9 color-scheme-inherit text-left elementor-widget elementor-widget-text-editor"
										data-id="c753bd9" data-element_type="widget" data-e-type="widget"
										data-widget_type="text-editor.default">
										<h2>{{ __('1. Objeto') }}</h2>
										<p class="isSelectedEnd">{{ __('Las presentes Condiciones Generales de Venta regulan la compra de productos realizada a través del sitio web') }} <a
												href="../"><strong>{{ __('https://domaine.pt') }}</strong></a>{{ __(', titularidad de') }} <strong>{{ __('Arquisset de Construccio S.L.') }}</strong></p>
										<p class="isSelectedEnd">{{ __('La realización de un pedido implica la aceptación plena de las presentes condiciones.') }}</p>
										<h2>{{ __('2. Identificación del vendedor') }}</h2>
										<p class="isSelectedEnd"><strong>{{ __('Titular:') }}</strong> {{ __('Arquisset de Construccio S.L.') }}
										</p>
										<p class="isSelectedEnd"><strong>{{ __('CIF:') }}</strong> {{ __('B63714778') }}</p>
										<p class="isSelectedEnd"><strong>{{ __('Domicilio social:') }}</strong> {{ __('Calle Avenir 8, 08006 Barcelona, España.') }}</p>
										<p class="isSelectedEnd"><strong>{{ __('Correo electrónico:') }}</strong> <a
												href="mailto:contacto@novaterra.pt">contacto@novaterra.pt</a>
										</p>
										<p class="isSelectedEnd"><strong>{{ __('Sitio web:') }}</strong> <a
												href="../">{{ __('https://domaine.pt') }}</a></p>
										<h2>{{ __('3. Productos') }}</h2>
										<p class="isSelectedEnd">{{ __('Los productos comercializados incluyen, entre otros:') }}
										</p>
										<ul data-spread="false">
											<li>{{ __('Materiales de construcción.') }}</li>
											<li>{{ __('Barbacoas.') }}</li>
											<li>{{ __('Casetas de jardín.') }}</li>
											<li>{{ __('Cenadores.') }}</li>
											<li>{{ __('Pérgolas.') }}</li>
											<li>{{ __('Techos para terrazas.') }}</li>
											<li>{{ __('Piscinas.') }}</li>
											<li>{{ __('Piscinas desmontables.') }}</li>
											<li>{{ __('Muebles de jardín.') }}</li>
											<li>{{ __('Pellet.') }}</li>
											<li>{{ __('Palets de leña.') }}</li>
											<li>{{ __('Generadores.') }}</li>
											<li>{{ __('Calefactores.') }}</li>
											<li>{{ __('Herramientas para madera.') }}</li>
											<li>{{ __('Equipos industriales.') }}</li>
											<li>{{ __('Equipos para jardinería.') }}</li>
											<li>{{ __('Productos para taller.') }}</li>
										</ul>
										<p class="isSelectedEnd">{{ __('Las fotografías, descripciones y características tienen carácter informativo. Aunque se procura la máxima exactitud, pueden existir pequeñas variaciones respecto al producto final.') }}</p>
										<h2>{{ __('4. Disponibilidad') }}</h2>
										<p class="isSelectedEnd">{{ __('Todos los pedidos están sujetos a la disponibilidad del producto.') }}</p>
										<p class="isSelectedEnd">{{ __('Si, una vez realizado el pedido, un artículo no estuviera disponible, el cliente será informado lo antes posible y podrá optar por:') }}</p>
										<ul data-spread="false">
											<li>{{ __('Esperar la reposición del producto.') }}</li>
											<li>{{ __('Sustituirlo por otro de características similares.') }}</li>
											<li>{{ __('Solicitar el reembolso íntegro del importe abonado.') }}</li>
										</ul>
										<h2>{{ __('5. Precios') }}</h2>
										<p class="isSelectedEnd">{{ __('Todos los precios se muestran en euros (€).') }}</p>
										<p class="isSelectedEnd">{{ __('Salvo indicación expresa en contrario, los precios incluyen el IVA aplicable conforme a la legislación española.') }}</p>
										<p class="isSelectedEnd">{{ __('Los gastos de transporte, montaje, instalación, seguros u otros servicios adicionales se indicarán claramente antes de finalizar el pedido.') }}</p>
										<p class="isSelectedEnd">{{ __('Arquisset de Construccio S.L. podrá modificar los precios en cualquier momento, sin que ello afecte a los pedidos ya confirmados.') }}</p>
										<h2>{{ __('6. Proceso de compra') }}</h2>
										<p class="isSelectedEnd">{{ __('Para realizar una compra el cliente deberá:') }}</p>
										<ol start="1" data-spread="false">
											<li>{{ __('Seleccionar los productos.') }}</li>
											<li>{{ __('Añadirlos al carrito.') }}</li>
											<li>{{ __('Introducir los datos de facturación y envío.') }}</li>
											<li>{{ __('Elegir el método de transporte.') }}</li>
											<li>{{ __('Seleccionar la forma de pago.') }}</li>
											<li>{{ __('Confirmar el pedido.') }}</li>
										</ol>
										<p class="isSelectedEnd">{{ __('Tras la confirmación del pedido, el cliente recibirá un correo electrónico con el resumen de la compra.') }}</p>
										<h2>{{ __('7. Formas de pago') }}</h2>
										<p class="isSelectedEnd">{{ __('El sitio web podrá aceptar, entre otros, los siguientes medios de pago:') }}</p>
										<ul data-spread="false">
											<li>{{ __('Tarjetas de crédito y débito.') }}</li>
											<li>{{ __('Transferencia bancaria.') }}</li>
											<li>{{ __('PayPal.') }}</li>
											<li>{{ __('Stripe.') }}</li>
											<li>{{ __('Otros métodos disponibles durante el proceso de compra.') }}</li>
										</ul>
										<p class="isSelectedEnd">{{ __('El pago se realizará mediante plataformas seguras que garantizan la protección de los datos financieros del cliente.') }}</p>
										<h2>{{ __('8. Envíos') }}</h2>
										<p class="isSelectedEnd">{{ __('Los pedidos se entregarán en la dirección indicada por el cliente.') }}</p>
										<p class="isSelectedEnd">{{ __('Los plazos de entrega son orientativos y pueden variar según:') }}</p>
										<ul data-spread="false">
											<li>{{ __('Disponibilidad del producto.') }}</li>
											<li>{{ __('Destino del envío.') }}</li>
											<li>{{ __('Empresa transportista.') }}</li>
											<li>{{ __('Circunstancias excepcionales.') }}</li>
										</ul>
										<p class="isSelectedEnd">{{ __('El riesgo sobre los productos se transmitirá al consumidor en el momento de la entrega.') }}</p>
										<h2>{{ __('9. Recepción del pedido') }}</h2>
										<p class="isSelectedEnd">{{ __('El cliente deberá comprobar el estado del pedido en el momento de la entrega.') }}</p>
										<p class="isSelectedEnd">{{ __('Si detecta daños visibles o incidencias en el embalaje, deberá hacerlo constar en el albarán del transportista y comunicarlo al vendedor en un plazo máximo de 48 horas.') }}</p>
										<h2>{{ __('10. Derecho de desistimiento') }}</h2>
										<p class="isSelectedEnd">{{ __('De conformidad con el Real Decreto Legislativo 1/2007, el consumidor dispone de un plazo de') }} <strong>{{ __('14 días naturales') }}</strong>
											{{ __('desde la recepción del pedido para desistir del contrato sin necesidad de justificar su decisión.') }}</p>
										<p class="isSelectedEnd">{{ __('Para ejercer este derecho deberá comunicarlo por escrito a:') }}</p>
										<p class="isSelectedEnd"><a
												href="mailto:contacto@novaterra.pt"><strong>contacto@novaterra.pt</strong></a>
										</p>
										<p class="isSelectedEnd">{{ __('El producto deberá devolverse:') }}</p>
										<ul data-spread="false">
											<li>{{ __('Sin utilizar.') }}</li>
											<li>{{ __('En perfecto estado.') }}</li>
											<li>{{ __('Con su embalaje original.') }}</li>
											<li>{{ __('Con todos sus accesorios y documentación.') }}</li>
										</ul>
										<p class="isSelectedEnd">{{ __('El reembolso se efectuará utilizando el mismo medio de pago empleado por el cliente, una vez recibidos y comprobados los productos.') }}
										</p>
										<p class="isSelectedEnd">{{ __('Los gastos directos de devolución correrán a cargo del cliente, salvo que la legislación aplicable disponga lo contrario o el producto presente un defecto de origen.') }}</p>
										<h2>{{ __('11. Excepciones al derecho de desistimiento') }}</h2>
										<p class="isSelectedEnd">{{ __('No podrá ejercerse el derecho de desistimiento respecto de los productos excluidos por la legislación vigente, entre ellos:') }}</p>
										<ul data-spread="false">
											<li>{{ __('Productos fabricados conforme a especificaciones del cliente.') }}</li>
											<li>{{ __('Productos claramente personalizados.') }}</li>
											<li>{{ __('Productos precintados que no sean aptos para ser devueltos por razones de protección de la salud o higiene y cuyo precinto haya sido retirado.') }}
											</li>
											<li>{{ __('Otros supuestos previstos en el artículo 103 del Real Decreto Legislativo 1/2007.') }}</li>
										</ul>
										<h2>{{ __('12. Garantía legal') }}</h2>
										<p class="isSelectedEnd">{{ __('Todos los productos vendidos a consumidores cuentan con la garantía legal prevista en la normativa española vigente.') }}</p>
										<p class="isSelectedEnd">{{ __('En caso de falta de conformidad, el consumidor tendrá derecho, según corresponda, a la reparación, sustitución, rebaja del precio o resolución del contrato, de acuerdo con la legislación aplicable.') }}</p>
										<p class="isSelectedEnd">{{ __('La garantía no cubre daños derivados del uso indebido, accidentes, desgaste normal o manipulaciones no autorizadas.') }}</p>
										<h2>{{ __('13. Responsabilidad') }}</h2>
										<p class="isSelectedEnd">{{ __('Arquisset de Construccio S.L. no será responsable de los retrasos o incumplimientos debidos a causas de fuerza mayor, caso fortuito o circunstancias ajenas a su control.') }}</p>
										<p class="isSelectedEnd">{{ __('La responsabilidad del vendedor quedará limitada al importe efectivamente abonado por el cliente, salvo disposición legal en contrario.') }}</p>
										<h2>{{ __('14. Protección de datos') }}</h2>
										<p class="isSelectedEnd">{{ __('Los datos personales facilitados durante el proceso de compra serán tratados conforme al Reglamento (UE) 2016/679 (RGPD), la Ley Orgánica 3/2018 (LOPDGDD) y la Política de Privacidad del sitio web.') }}</p>
										<h2>{{ __('15. Atención al cliente') }}</h2>
										<p class="isSelectedEnd">{{ __('Para cualquier consulta relacionada con pedidos, devoluciones, garantías o reclamaciones, el cliente podrá contactar con:') }}</p>
										<p class="isSelectedEnd"><strong>{{ __('Correo electrónico:') }}</strong> <a
												href="mailto:contacto@novaterra.pt">contacto@novaterra.pt</a>
										</p>
										<h2>{{ __('16. Resolución de litigios') }}</h2>
										<p class="isSelectedEnd">{{ __('En caso de conflicto, las partes intentarán resolverlo de forma amistosa.') }}</p>
										<p class="isSelectedEnd">{{ __('Si no fuera posible, serán competentes los Juzgados y Tribunales que correspondan conforme a la legislación española en materia de consumidores y usuarios.') }}</p>
										<p class="isSelectedEnd">{{ __('Asimismo, los consumidores residentes en la Unión Europea pueden utilizar la Plataforma Europea de Resolución de Litigios en Línea (ODR), disponible en:') }}</p>
										<p class="isSelectedEnd"><a
												href="https://ec.europa.eu/consumers/odr">{{ __('https://ec.europa.eu/consumers/odr') }}</a>
										</p>
										<h2>{{ __('17. Legislación aplicable') }}</h2>
										<p class="isSelectedEnd">{{ __('Las presentes Condiciones Generales de Venta se rigen por la legislación española y, en particular, por:') }}</p>
										<ul data-spread="false">
											<li>{{ __('Reglamento (UE) 2016/679 (RGPD).') }}</li>
											<li>{{ __('Ley Orgánica 3/2018 (LOPDGDD).') }}</li>
											<li>{{ __('Ley 34/2002, de Servicios de la Sociedad de la Información y Comercio Electrónico (LSSI-CE).') }}</li>
											<li>{{ __('Real Decreto Legislativo 1/2007, por el que se aprueba el texto refundido de la Ley General para la Defensa de los Consumidores y Usuarios.') }}</li>
											<li>{{ __('Demás normativa española y europea aplicable.') }}</li>
										</ul>
									</div>
								</div>
							</div>
						</div>


					</article>



				</div>



				
			</main>

		</div>>
@endsection